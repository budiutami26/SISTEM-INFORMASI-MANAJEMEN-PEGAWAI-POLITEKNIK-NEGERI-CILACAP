<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

            $pegawai = Pegawai::orderBy('nama','desc');
            if (request()->nama) {
                $pegawai = $pegawai->where('nama','like','%'.request()->nama.'%');
            }
            $limit = 10;
            if (request()->limit) {
                $limit = request()->limit;
            }
            $pegawai = $pegawai->paginate($limit);
        return view('pegawai.Form', compact('pegawai','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Pegawai::all();
        // return view('pegawai.edit-tambah', $data);
        return view('pegawai.edit-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pegawai $pegawai)
    {
        $pengguna = new User([
            'name' => $request ->nama,
            'email' => $request ->email,
            'password' => Hash::make('user1234'),
            'role_id' => 2,
        ]);
        $pengguna->save();

        $pegawai = new Pegawai;
        $pegawai->user_id = $pengguna ->id;
        $pegawai->nip = $request ->nip;
        $pegawai->nama = $request ->nama;
        $pegawai->tempat_lahir = $request ->tempat_lahir;
        $pegawai->tgl_lahir = $request ->tgl_lahir;
        $pegawai->jenis_kelamin = $request ->jenis_kelamin;
        $pegawai->Agama = $request ->Agama;
        $pegawai->alamat = $request ->alamat;
        $pegawai->email = $request ->email;
        $pegawai->Pendidikan = $request ->Pendidikan;
        $pegawai->Jabatan = $request ->Jabatan;
        // dd($pegawai);
        $pegawai->save();

        return redirect('pegawai')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        // $role = Role::all();

        return view ('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $data['pegawai'] = $pegawai;
        // $data['role'] = Role::all();

        return view('pegawai.edit-tambah', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna, Pegawai $pegawai)
    {
        $update = ([
            'name' => $request->nama,
            'email' => $request->email,
        ]);
        $pengguna->whereId($request->id)->update(
            $update
        );

        $pegawai->nip = $request ->nip;
        $pegawai->nama = $request ->nama;
        $pegawai->tempat_lahir = $request ->tempat_lahir;
        $pegawai->tgl_lahir = $request ->tgl_lahir;
        $pegawai->jenis_kelamin = $request ->jenis_kelamin;
        $pegawai->Agama = $request ->Agama;
        $pegawai->alamat = $request ->alamat;
        $pegawai->email = $request ->email;
        $pegawai->Pendidikan = $request ->Pendidikan;
        $pegawai->Jabatan = $request ->Jabatan;

        $pegawai->save();

        return redirect('pegawai')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('error', 'Data berhasil dihapus');
    }
}
