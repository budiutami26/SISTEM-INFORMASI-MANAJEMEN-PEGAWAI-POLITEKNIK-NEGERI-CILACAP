@extends('layouts.maindashboard')
@section('title')
    Profile
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i>Profile</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Profile</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if (isset($data))
                            <form class="form-horizontal" action="{{ route('profile.up') }}"
                                method="post">
                                {{ csrf_field() }}

                        @endif
                        @php
                            // dd($data)
                        @endphp
                        @if (Auth::user()->role_id == 1)
                            @foreach ($data as $e)
                            <div class="form-group row">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="name"
                                        value="{{ $e->name }}">
                                    <input type="hidden" name="id" value="{{ $e->id }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="email"
                                        value="{{ $e->email}}">
                                </div>
                            </div>
                            @endforeach
                        @else
                            @foreach ($data as $d)
                        <div class="form-group row">
                            <label class="control-label col-md-3">NIP</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="number" name="nip" value="{{ $d->nip }}">
                                <input type="hidden" name="id"
                                    value="{{ $d->user_id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="name" value="{{ $d->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="tempat_lahir" value="{{ $d->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="date" name="tgl_lahir" value="{{ $d->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-8">
                                <textarea required class="form-control" rows="4" name="alamat">{{ $d->alamat }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="jenis_kelamin" value="Laki-laki" {{ $d->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="jenis_kelamin" value="Perempuan" {{ $d->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-8">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Islam" {{ $d->Agama == 'Islam' ? 'checked' : '' }}>Islam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Khatolik" {{ $d->Agama == 'Khatolik' ? 'checked' : '' }}>Khatolik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Kristen" {{ $d->Agama == 'Kristen' ? 'checked' : '' }}>Kristen
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Budha" {{ $d->Agama == 'Budha' ? 'checked' : '' }}>Budha
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Hindu" {{ $d->Agama == 'Hindu' ? 'checked' : '' }}>Hindu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Khongucu" {{ $d->Agama == 'Khongucu' ? 'checked' : '' }}>Khongucu
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-8">
                                <select class="form-control" name="Pendidikan" id="exampleSelect1">
                                    <option selected>Pilih Pendidikan</option>
                                    <option value="SD" {{ $d->Pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                    <option value="SMP" {{ $d->Pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                    <option value="SMA/SMK" {{ $d->Pendidikan == 'SMA/SMK' ? 'selected' : '' }}>SMA/SMK</option>
                                    <option value="D3" {{ $d->Pendidikan == 'D3' ? 'selected' : '' }}>D3</option>
                                    <option value="D4/S1" {{ $d->Pendidikan == 'D4/S1' ? 'selected' : '' }}>D4/S1</option>
                                    <option value="S2" {{ $d->Pendidikan == 'S2' ? 'selected' : '' }}>S2</option>
                                    <option value="Lainya" {{ $d->Pendidikan == 'Lainya' ? 'selected' : '' }}>Lainya</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Pilih Jabatan</label>
                            <div class="col-md-8">
                                <select class="form-control" name="Jabatan" id="exampleSelect1">
                                    <option selected>Pilih Jabatan</option>
                                    <option value="Dosen" {{ $d->Jabatan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Staff" {{ $d->Jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="Pekerja" {{ $d->Jabatan == 'Pekerja' ? 'selected' : '' }}>Pekerja
                                    </option>
                                    <option value="Satpam" {{ $d->Jabatan == 'Satpam' ? 'selected' : '' }}>Satpam
                                    </option>
                                    <option value="Teknisi" {{ $d->Jabatan == 'Teknisi' ? 'selected' : '' }}>Teknisi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="email" value="{{$d->email}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                    {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Password Lama</label>
                        <div class="col-md-8">
                            <input required class="form-control" type="password" name="password"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Password Baru</label>
                        <div class="col-md-8">
                            <input required class="form-control" type="password" name="password"
                                value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Konfirmasi Password Baru</label>
                        <div class="col-md-8">
                            <input required class="form-control" type="password" name="password"
                                value="">
                        </div>
                    </div>--}}
                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-12 col-md-offset-3" style="float: right; display: flex; justify-content: end">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
