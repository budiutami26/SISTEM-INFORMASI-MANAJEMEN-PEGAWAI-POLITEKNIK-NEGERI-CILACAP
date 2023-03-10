@extends('layouts.maindashboard')
@section('title')
    Data Admin
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="div">
                <h1><i class="fa fa-laptop"></i> Data Admin</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item"><a href="#">Data Admin</a></li>
            </ul>
        </div>
        <div class="tile mb-4">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" class="form-inline" method="get">
                            <input type="text" name="nama" class="form-control mb-2 mr-2"
                                value="{{ request()->nama }}" placeholder="Cari Nama admin">
                            <select name="limit" class="form-control mb-2 mr-2">
                                <option @if (request()->limit == 10) selected @endif>10</option>
                                <option @if (request()->limit == 20) selected @endif>20</option>
                                <option @if (request()->limit == 50) selected @endif>50</option>
                                <option @if (request()->limit == 100) selected @endif>100</option>
                                <option @if (request()->limit == 500) selected @endif>500</option>
                            </select>
                            <button type="submit" class="btn btn-info mb-2"><i class="fa fa-search"></i></button>
                            &nbsp;
                            <div class="btn btn-info mb-2"><a href="{{ route('pengguna.create')}}" style="color: white"><i class="fa fa-plus">&nbsp;Tambah Admin</i></a></div>
                        </form>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="width:5%">Aksi</th>
                                    <th ></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1 + (request()->limit ? intval(request()->limit) : 10) * ((request()->page ? intval(request()->page) : 1) - 1);
                                @endphp

                                @foreach ($pengguna as $tampil)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $tampil->name }}</td>
                                        <td>{{ $tampil->email }}</td>
                                        <td>
                                            <a href="{{ url('/pengguna/' . $tampil->id . '/edit') }}" class="btn btn-info"><span
                                                    class="fa fa-edit (alias)"></span></a>

                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn_modal_hapus" type="button"
                                                data-url="{{ route('pengguna.destroy', $tampil->id) }}"><span
                                                    class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pengguna->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
