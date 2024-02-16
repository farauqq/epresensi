<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class ValidateSiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        // if ($request->input('token') !== 'my-secret-token') {
        //     return redirect('home');
        // }

        $session = Session::get("siswa");
        if(!$session){
            return redirect('sesi')->withErrors('Anda harus login dahulu');
        }

        if($session->role != "siswa"){
            return redirect()->back()->withErrors('Role tidak diizinkan');
        }

        return $next($request);
    }
}