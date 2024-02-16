<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\absen;

class DashboardController extends Controller
{
    public function dashboard(){
        $data["ref_siswa"] = count(siswa::all());
        $data["ref_all"] = count(absen::all());
        $total_income_today = 0;
        $total_income_month = 0;
        $day = date("Y-m-d");
        $month = date("Y-m");
        foreach(absen::all() as $k => $row){
            $order_date = explode("-", $row->tanggal);
            $order_date_day = explode(" ", $order_date[2]);
            if($order_date[0]."-".$order_date[1] == $month){
                $total_income_month ++;
            }
            if($order_date[0]."-".$order_date[1]."-".$order_date_day[0] == $day){
                $total_income_today ++;
            }
        }
        $data['ref_today'] = $total_income_today;
        $data['ref_month'] = $total_income_month;
        return view('dashboard', $data);
    }
}
