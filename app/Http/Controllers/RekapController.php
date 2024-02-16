<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\siswa;
use App\Models\absen;
use DB;

class RekapController extends Controller
{
    public $filterAll = "_ALL_";

    public function index(Request $request){
        
        $filterBulan = $request->filterBulan;
        if(!$filterBulan){
            $filterBulan = $this->filterAll;
        }

        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = absen::select("absen.*", "C.nama as siswa_nama")
                ->join("token as B", "absen.token", "=", "B.value")
                ->join("siswa as C", "B.id", "=", "C.id")
                ->where(function($query) use ($katakunci){
                    $query->where("C.nama", "like", "%".$katakunci."%")
                    ->orWhere("absen.tanggal", "like", "%".$katakunci."%");
                });
        }else{
            $data = absen::select("absen.*", "C.nama as siswa_nama")
                ->join("token as B", "absen.token", "=", "B.value")
                ->join("siswa as C", "B.id", "=", "C.id");
        }
        if($filterBulan != $this->filterAll){
            $filterBulan = explode("-", $filterBulan);
            $data = $data
                ->whereYear('absen.tanggal', '=', $filterBulan[0])
                ->whereMonth('absen.tanggal', '=', $filterBulan[1]);
                
            $filterBulan = $filterBulan[0] . "-" . $filterBulan[1];
        }
        $data = $data->orderBy('absen.tanggal', 'desc');

        $export = $request->export;
        if($export){
            $data = $data->get()->toArray();
        }else{
            $data = $data->paginate($jumlahbaris);
        }

        if($export){
            $jsonData = [];
            foreach($data as $key => $value){
                array_push($jsonData, ["No." => $key+1, "Tanggal" => $value['tanggal'], "Nama" => $value['siswa_nama']]);
            }
            //dd($jsonData);
            return $this->export($jsonData);
        }
        return view('rekap')->with('data', $data)->with("filterBulan", $filterBulan);
    }

    public function export($data){
        $json = [
            "filename" => "Rekap Presensi Perpustakaan",
            "column_width" => array(10, 30, 40),
            "title" => "Rekap Presensi Perpustakaan SMAN 1 Mejobo",
            "subtitle" => "",
            "data" => $data
        ];
        $data = $json;
        // $url = 'http://192.168.1.6:5555/export_excel';
        $url = 'http://62.72.51.244:5555/export_excel';
        $response = Http::withHeaders([
                'Content-Type' => 'application/json'
            ])
            ->post($url, $json);
        $filePath = storage_path($json['filename'] . '.xlsx');
        file_put_contents($filePath, $response->body());
        return response()->download($filePath, $json['filename'] . '.xlsx')->deleteFileAfterSend(true);
        
    }
}