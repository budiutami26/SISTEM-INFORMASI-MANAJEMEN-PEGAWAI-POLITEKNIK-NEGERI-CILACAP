<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();

            $pengguna = User::orderBy('name','desc')->where('role_id', '=', 1);
            if (request()->name) {
                $pengguna = $pengguna->where('name','like','%'.request()->name.'%');
            }
            $limit = 10;
            if (request()->limit) {
                $limit = request()->limit;
            }
            $pengguna = $pengguna->paginate($limit);
        return view('pengguna.Form', compact('pengguna','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.edit-tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $pengguna)
    {
        $pengguna = new User;
        $pengguna->name = $request ->name;
        $pengguna->email = $request ->email;
        $pengguna->password = Hash::make($request->password);
        $pengguna->role_id = 1;
        $pengguna->save();

        return redirect('pengguna')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $   id
     * @return \Illuminate\Http\Response
     */
    public function show(User $pengguna)
    {
        // $role = Role::all();

        return view ('pengguna.show', compact('pengguna'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $pengguna)
    {
        $data['pengguna'] = $pengguna;
        // $data['role'] = Role::all();

        return view('pengguna.edit-tambah', $data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $pengguna)
    {
        $pengguna->name = $request ->name;
        $pengguna->email = $request ->email;
        $pengguna->save();

        return redirect('pengguna')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $pengguna)
    {
        $pengguna->delete();
        return back()->with('error', 'Data berhasil dihapus');
    }
}
