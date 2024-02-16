<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\siswa;
use App\Models\absen;

class UserDashboardController extends Controller
{
    public function userdashboard(){
        
        $id = Session::get("siswa")->id;
        //$id = "1";
        $siswa = siswa::where("id", $id)->first();

        $token = DB::select("
            SELECT  * FROM token WHERE id = ? ORDER BY created DESC
        ", [$id]);
        if(count($token) == 0){
            $token = $this->generateNewToken($id);
        }else{
            $token = $token[0];
            if($token->expired < date("Y-m-d H:i:s")){
                $token = $this->generateNewToken($id);
            }else{
                $token = $token->value;
            }
        }

        $absen = absen::select("absen.*", "C.nama as siswa_nama")
        ->join("token as B", "absen.token", "=", "B.value")
        ->join("siswa as C", "B.id", "=", "C.id")
        ->where("C.id", $id);
        $absen = $absen->orderBy('absen.tanggal', 'desc');
        $absen = $absen->paginate(5);

        $data["code"] = $token;
        $data["data"] = $siswa;
        $data["absen"] = $absen;
       // dd($data);
        return view('userdashboard', $data);
    }


    public function generateNewToken($id){
        $currentYMDHIS = date("Y-m-d H:i:s");
        $value = md5($currentYMDHIS . $id);
        $newToken["value"] = $value;
        $newToken["id"] = $id;
        $newToken["created"] = $currentYMDHIS;
        $newToken["expired"] = date('Y-m-d H:i:s', strtotime($currentYMDHIS . ' +1 day'));
        DB::table("token")->insertGetId($newToken);
        return $value;
    }


    public function absen(Request $request){
        $token = $request->token;
        $currentYMDHIS = date("Y-m-d H:i:s");
        $cekToken = DB::table("token")->where("value", $token)->where("expired", ">", $currentYMDHIS);
        if(count($cekToken->get()) == 0){
            return response()->json(['success' => [false, 'Token absen tidak valid/kadaluarsa']], 200);
        }
        $cekToken->update([
            "expired" => $currentYMDHIS 
        ]);

        $absenId = absen::insertGetId([
            "token" => $token,
            "tanggal" => date("Y-m-d H:i:s")
        ]);
        
        $siswa = siswa::join("token", "siswa.id", "=", "token.id")->where("token.value", $token)->first();
        return response()->json(['success' => [true, 'Absen berhasil, selamat datang ' . $siswa->nama]], 200);
    }
}
