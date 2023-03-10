<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    //
    public function tampil(User $user){

        if (Auth::user()->role_id == 1){
            $data = $user::whereId(Auth::id())->get();
        }else{
            $data = $user::leftJoin('pegawai', 'pegawai.user_id','=','users.id')->where('pegawai.user_id', '=', Auth::id())->get();
        }

        return view('ProfileUser.profile', ['data'=>$data]);
    }

    public function update(User $user ,Request $request, Pegawai $pegawai){
        if (Auth::user()->role_id == 1){
            $update = ([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->whereId($request->id)->update(
                $update
            );

            return redirect()->route('profile')->with('succes','berhasil merubah profile');
        }else{
            $update = ([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            $user->whereId($request->id)->update(
                $update
            );

            $peg = ([
                'nip' => $request ->nip,
                'user_id' => $request ->id,
                'nama' => $request ->name,
                'tempat_lahir' => $request ->tempat_lahir,
                'tgl_lahir' => $request ->tgl_lahir,
                'jenis_kelamin' => $request ->jenis_kelamin,
                'Agama' => $request ->Agama,
                'alamat' => $request ->alamat,
                'email' => $request ->email,
                'Pendidikan' => $request ->Pendidikan,
                'Jabatan' => $request ->Jabatan,
            ]);
            $pegawai->whereId($request->id)->update(
                $peg
            );

            return redirect()->route('profile')->with('status', 'profile-updated');
        }


    }

}
