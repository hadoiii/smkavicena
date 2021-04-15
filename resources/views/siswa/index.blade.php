@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">DATA SISWA</h3>
                             <!-- Button trigger modal -->
                             <div class="right">
                                <button type="button" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>NISN</th>
                                    <th>NAMA DEPAN</th>
                                    <th>NAMA BELAKANG</th>
                                    <th>JENIS KELAMIN</th>
                                    <th>ALAMAT</th>
                                    <th>KELAS</th>
                                    <th>EMAIL</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_siswa as $siswa)
                                <tr>
                                    <td>{{$siswa->nisn}}</td>
                                    <td><a href="/siswa/{{$siswa->id_siswa}}/profile">{{$siswa->nama_depan}}</a></td>
                                    <td><a href="/siswa/{{$siswa->id_siswa}}/profile">{{$siswa->nama_belakang}}</a></td>
                                    <td>{{$siswa->jenis_kelamin}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td>{{$siswa->kelas}}</td>
                                    <td>{{$siswa->email}}</td>
                                    <td><a href="/siswa/{{$siswa->id_siswa}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a href="/siswa/{{$siswa->id_siswa}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')">Hapus</a></td>
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
            <h5 class="modal-title" id="exampleModalLabel">INPUT DATA SISWA</h5>
            <div class="modal-body">
            <form action="/siswa/create" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                    <input name="nisn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN">
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
                <select name="golongan_darah" class="form-control" aria-label="Default select example">
                    <option selected>Golongan Darah</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="AB">O</option>
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
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                    <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
                    <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ayah">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ayah</label>
                    <input name="pekerjaan_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ayah">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                    <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ibu">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ibu</label>
                    <input name="pekerjaan_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ibu">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Wali</label>
                    <input name="nama_wali" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Wali">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Darurat</label>
                    <input name="no_darurat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Darurat">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Sekolah Asal</label>
                    <input name="sekolah_asal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sekolah Asal">
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nomor Ijazah SMP</label>
                    <input name="no_ijazah_smp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ijazah SMP">
                </div>
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