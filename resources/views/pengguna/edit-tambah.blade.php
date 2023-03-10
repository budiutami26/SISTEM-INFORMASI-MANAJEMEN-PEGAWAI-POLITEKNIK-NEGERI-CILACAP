@extends('layouts.maindashboard')
@section('title')
    {{ isset($pengguna) ? 'Edit' : 'Tambah' }} Pengguna
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> {{ isset($pengguna) ? 'Edit' : 'Tambah' }} Pengguna</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pengguna</li>
                <li class="breadcrumb-item"><a href="#">{{ isset($pengguna) ? 'Edit' : 'Tambah' }} Pengguna</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if (isset($pengguna))
                            <form class="form-horizontal" action="{{ route('pengguna.update', $pengguna->id) }}"
                                method="post">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            @else
                                <form class="form-horizontal" action="{{ route('pengguna.store') }}" method="post">
                                    {{ csrf_field() }}
                        @endif
                        @php
                            // dd($pengguna)
                        @endphp
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="name"
                                    value="{{ isset($pengguna) ? $pengguna->name : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="email"
                                    value="{{ isset($pengguna) ? $pengguna->email : '' }}">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="password" name="password"
                                    value="">
                            </div>
                        </div> --}}
                    </div>

                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                                <a class="btn btn-secondary" href="{{ route('pengguna.index') }}"><i
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
