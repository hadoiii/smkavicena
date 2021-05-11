@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">DAFTAR SISWA</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>NISN</th>
                                    <th>NAMA SISWA</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($kelas->siswa as $siswa)
                                <tr>
                                    <td>{{$siswa->nisn}}</td>
                                    <td>{{$siswa->nama_lengkap()}}</td>
                                    <td><a href="/siswa/{{$siswa->id}}/profile" class="btn btn-primary">Profil</a></td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop