<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
// use Hash;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 5;
        if(strlen($katakunci)){
            $data = siswa::orderBy('id', 'asc')
                ->where('nama', 'like', "%$katakunci%")
                ->where("role", "!=", "admin")
                 ->orWhere('email', 'like', "%$katakunci%")
                 ->paginate($jumlahbaris);
        }else{
            $data = siswa::orderBy('id', 'asc')->where("role", "!=", "admin")->paginate(5);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            return redirect()->to('siswa')->with('error','Email telah digunakan');
        }
        siswa::create($data);
        if($request->type == "register"){
            Session::put('siswa', $data);
        }else{
            $data["role"] = "admin";
        }
        return redirect()->to('siswa')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = siswa::where('id', $id)->first();
        return view('siswa.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password),
            'tgllhr' => $request->tgllhr,

        ];
        siswa::where('id', $id)->update($data);
        return redirect()->to('siswa')->with('success','Berhasil menambahkan data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('id', $id)->delete();
        return redirect()->to('siswa');
    }
}
