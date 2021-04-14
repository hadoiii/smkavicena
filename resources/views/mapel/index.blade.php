@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <<h3 class="panel-title">DATA MATA PELAJARAN</h3>
                             <!-- Button trigger modal -->
                             <div class="right">
                                <button type="button" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>KODE MATA PELAJARAN</th>
                                    <th>NAMA MATA PELAJARAN</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_mapel as $mapel)
                                <tr>
                                    <td>{{$mapel->id_mata_pelajaran}}</td>
                                    <td>{{$mapel->nama_mata_pelajaran}}</td>
                                    <td><a href="/mapel/{{$mapel->id_mata_pelajaran}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a href="/mapel/{{$mapel->id_mata_pelajaran}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')">Hapus</a></td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">INPUT DATA MATA PELAJARAN</h5>
            <div class="modal-body">
            <form action="/mapel/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">KODE MATA PELAJARAN</label>
                    <input name="id_mata_pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NAMA MATA PELAJARAN</label>
                    <input name="nama_mata_pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                </div>
                <br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
@stop