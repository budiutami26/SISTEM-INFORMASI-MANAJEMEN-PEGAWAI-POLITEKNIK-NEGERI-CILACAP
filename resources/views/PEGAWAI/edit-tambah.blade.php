@extends('layouts.maindashboard')
@section('title')
    {{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> {{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item"><a href="#">{{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if (isset($pegawai))
                            <form class="form-horizontal" action="{{ route('pegawai.update', $pegawai->id) }}"
                                method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                                <input type="hidden" name="id"
                                    value="{{ $pegawai->user_id }}">
                            @else
                                <form class="form-horizontal" action="{{ route('pegawai.store') }}" method="post">
                                    {{ csrf_field() }}
                        @endif
                        @php
                            // dd($pegawai)
                        @endphp
                        <div class="form-group row">
                            <label class="control-label col-md-3">NIP</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="number" name="nip"
                                    value="{{ isset($pegawai) ? $pegawai->nip : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="nama"
                                    value="{{ isset($pegawai) ? $pegawai->nama : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="tempat_lahir" value="{{ isset($pegawai) ? $pegawai->tempat_lahir : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="date" name="tgl_lahir" value="{{ isset($pegawai) ? $pegawai->tgl_lahir : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-8">
                                <textarea required class="form-control" rows="4" name="alamat">{{ isset($pegawai) ? $pegawai->alamat : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="jenis_kelamin" value="Laki-laki"
                                            {{ isset($pegawai) && $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="jenis_kelamin" value="Perempuan"
                                            {{ isset($pegawai) && $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>Perempuan
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
                                            name="Agama" value="Islam"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Islam' ? 'checked' : '' }}>Islam
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Khatolik"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Khatolik' ? 'checked' : '' }}>Khatolik
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Kristen"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Kristen' ? 'checked' : '' }}>Kristen
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Budha"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Budha' ? 'checked' : '' }}>Budha
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Hindu"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Hindu' ? 'checked' : '' }}>Hindu
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input required class="form-check-input" type="radio" class="sr-only"
                                            name="Agama" value="Khongucu"
                                            {{ isset($pegawai) && $pegawai->Agama == 'Khongucu' ? 'checked' : '' }}>Khongucu
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Pendidikan</label>
                            <div class="col-md-8">
                            <select class="form-control" name="Pendidikan" id="exampleSelect1">
                                <option selected>Pilih Pendidikan</option>
                                <option value="SD" {{isset($pegawai) && $pegawai->Pendidikan == 'SD' ? 'selected' : ''}}>SD</option>
                                <option value="SMP" {{isset($pegawai) && $pegawai->Pendidikan == 'SMP' ? 'selected' : ''}}>SMP</option>
                                <option value="SMA/SMK" {{isset($pegawai) && $pegawai->Pendidikan == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                <option value="D3" {{isset($pegawai) && $pegawai->Pendidikan == 'D3' ? 'selected' : ''}}>D3</option>
                                <option value="D4/S1" {{isset($pegawai) && $pegawai->Pendidikan == 'D4/S1' ? 'selected' : ''}}>D4/S1</option>
                                <option value="S2" {{isset($pegawai) && $pegawai->Pendidikan == 'S2' ? 'selected' : ''}}>S2</option>
                                <option value="Lainya" {{isset($pegawai) && $pegawai->Pendidikan == 'Lainya' ? 'selected' : ''}}>Lainya</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Pilih Jabatan</label>
                            <div class="col-md-8">
                                <select class="form-control" name="Jabatan" id="exampleSelect1">
                                    <option selected>Pilih Jabatan</option>
                                    <option value="Dosen"
                                        {{ isset($pegawai) && $pegawai->Jabatan == 'Dosen' ? 'selected' : '' }}>Dosen</option>
                                    <option value="Staff"
                                        {{ isset($pegawai) && $pegawai->Jabatan == 'Staff' ? 'selected' : '' }}>Staff</option>
                                    <option value="Pekerja"
                                        {{ isset($pegawai) && $pegawai->Jabatan == 'Pekerja' ? 'selected' : '' }}>Pekerja
                                    </option>
                                    <option value="Satpam"
                                        {{ isset($pegawai) && $pegawai->Jabatan == 'Satpam' ? 'selected' : '' }}>Satpam
                                    </option>
                                    <option value="Teknisi"
                                        {{ isset($pegawai) && $pegawai->Jabatan == 'Teknisi' ? 'selected' : '' }}>Teknisi
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="email" value="{{ isset($pegawai) ? $pegawai->email : '' }}">
                            </div>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                                <a class="btn btn-secondary" href="{{route('pegawai.index')}}"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
