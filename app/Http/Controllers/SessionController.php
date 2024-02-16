<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    function index(){
        return view('sesi/login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $siswa = siswa::where("email", $request->email)->first();
        if(!$siswa){
            Session::flash("error", "Akun tidak ditemukan");
            return redirect('sesi')->withErrors('Email tidak ditemukan');
        }
        if(Hash::check($request->password, $siswa->password)){
            if($siswa->role == "admin"){
                Session::put('siswa', $siswa);
                return redirect('/');
            }else{
                Session::put('siswa', $siswa);
                return redirect('user');
            }
        }else{
            Session::flash("error", "Password salah");
            return redirect('sesi')->withErrors('Password salah');
        }
    }

    function logout(){
        //Auth::logout();
        Session::remove("siswa");
        return redirect('sesi')->with('Success', 'Berhasil Logout');
    }

    function register(){
        return view('sesi/register');
    }

    function create(Request $request){
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'tgllhr' => $request->tgllhr,

        ];
        $cek = siswa::where("email", $request->email)->first();
        if($cek){
            Session::flash("error", "Email telah digunakan");
            return redirect()->to('sesi/register')->with('error','Email telah digunakan');
        }
        siswa::create($data);
        if($request->type == "register"){
            Session::put('siswa', $data);
        }else{
            $data["role"] = "admin";
        }
        return redirect()->to('sesi')->with('success','Berhasil menambahkan data');
    }
}