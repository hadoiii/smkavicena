@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">DATA GURU</h3>
                             <!-- Button trigger modal -->
                             <div class="right">
                                <button type="button" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>NIP</th>
                                    <th>NAMA DEPAN</th>
                                    <th>NAMA BELAKANG</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>EMAIL</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_guru as $guru)
                                <tr>
                                    <td>{{$guru->nip}}</td>
                                    <td><a href="/guru/{{$guru->id}}/profile">{{$guru->nama_depan}}</a></td>
                                    <td><a href="/guru/{{$guru->id}}/profile">{{$guru->nama_belakang}}</a></td>
                                    <td>{{$guru->jenis_kelamin}}</td>
                                    <td>{{$guru->alamat}}</td>
                                    <td>{{$guru->id_mata_pelajaran}}</td>
                                    <td>{{$guru->email}}</td>
                                    <td><a href="/guru/{{$guru->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a href="/guru/{{$guru->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')">Hapus</a></td>
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
            <h5 class="modal-title" id="exampleModalLabel">INPUT DATA GURU</h5>
            <div class="modal-body">
            <form action="/guru/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NIP</label>
                    <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                </div>
                <br>
                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                </select>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir">
                </div>
                <br>
                <select name="agama" class="form-control" aria-label="Default select example">
                    <option selected>Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Kong Hu Chu">Kong Hu Chu</option>
                </select>
                <br>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat"></textarea>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                    <input name="no_ponsel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ponsel">
                </div>
                <br>
                <!-- DINONAKTIFKAN UNTUK SEMENTARA
                <div class="mb-3">
                <select name="id_mata_pelajaran" class="form-control" aria-label="Default select example">
                    <option selected>Mata Pelajaran</option>
                    @foreach($data_mapel as $mapel)
                    <option value="{{$mapel->id_mata_pelajaran}}">{{$mapel->nama_mata_pelajaran}}</option>
                    @endforeach
                </select>    
                </div>
                <br>
                -->
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