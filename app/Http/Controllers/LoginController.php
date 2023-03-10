<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Pegawai;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard1');
        }
        // dd($request);
        return back()->with([
            'loginError' => 'email atau Password salah',
        ]);
    }

    public function dashboard(){
        $jml_pegawai = Pegawai::count();
        return view('layouts.dashboard', compact('jml_pegawai'));
    }

    public function logout(Request $request)
    {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect('/login1');
    }
}


