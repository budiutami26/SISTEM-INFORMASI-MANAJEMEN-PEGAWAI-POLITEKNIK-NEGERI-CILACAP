@extends('layouts.maindashboard')
@section('title')
    Dashboard
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="div">
                <h1><i class=""></i>Selamat Datang di SIMPEG</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
            </ul>
        </div>
        <div class="tile mb-4">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="" style="justify-items: center; justify-content: center; text-align: center"><h4>Jumlah Pegawai Saat Ini</h4><hr>{{$jml_pegawai}}</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
