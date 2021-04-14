@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">EDIT DATA SISWA</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/siswa/{{$siswa->id_siswa}}/update" method="POST">
                            {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                                    <input name="nisn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{$siswa->nisn}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->nama_depan}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->nama_belakang}}">
                                </div>
                                <br>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Pria" @if ($siswa->jenis_kelamin == "Pria") selected @endif>Pria</option>
                                    <option value="Wanita" @if ($siswa->jenis_kelamin == "Wanita") selected @endif>Wanita</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{$siswa->tempat_lahir}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir" value="{{$siswa->tanggal_lahir}}">
                                </div>
                                <br>
                                <select name="agama" class="form-control" aria-label="Default select example">
                                    <option selected>Agama</option>
                                    <option value="Islam" @if ($siswa->agama == "Islam") selected @endif>Islam</option>
                                    <option value="Kristen" @if ($siswa->agama == "Kristen") selected @endif>Kristen</option>
                                    <option value="Katholik" @if ($siswa->agama == "Katholik") selected @endif>Katholik</option>
                                    <option value="Hindu" @if ($siswa->agama == "Hindu") selected @endif>Hindu</option>
                                    <option value="Budha" @if ($siswa->agama == "Budha") selected @endif>Budha</option>
                                    <option value="Kong Hu Chu" @if ($siswa->agama == "Kong Hu Chu") selected @endif>Kong Hu Chu</option>
                                </select>
                                <br>
                                <select name="golongan_darah" class="form-control" aria-label="Default select example">
                                    <option selected>Golongan Darah</option>
                                    <option value="A" @if ($siswa->golongan_darah == "A") selected @endif>A</option>
                                    <option value="B" @if ($siswa->golongan_darah == "B") selected @endif>B</option>
                                    <option value="AB" @if ($siswa->golongan_darah == "AB") selected @endif>AB</option>
                                    <option value="AB" @if ($siswa->golongan_darah == "O") selected @endif>O</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{$siswa->alamat}}</textarea>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$siswa->email}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                                    <input name="no_ponsel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ponsel" value="{{$siswa->no_ponsel}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                                    <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{$siswa->kelas}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
                                    <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ayah" value="{{$siswa->nama_ayah}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ayah</label>
                                    <input name="pekerjaan_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ayah" value="{{$siswa->pekerjaan_ayah}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                                    <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ibu" value="{{$siswa->nama_ibu}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ibu</label>
                                    <input name="pekerjaan_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ibu" value="{{$siswa->pekerjaan_ibu}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Wali</label>
                                    <input name="nama_wali" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Wali" value="{{$siswa->nama_wali}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Darurat</label>
                                    <input name="no_darurat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Darurat" value="{{$siswa->no_darurat}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Sekolah Asal</label>
                                    <input name="sekolah_asal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sekolah Asal" value="{{$siswa->sekolah_asal}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Ijazah SMP</label>
                                    <input name="no_ijazah_smp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ijazah SMP" value="{{$siswa->no_ijazah_smp}}">
                                </div>
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Update</button>
                                </div>
                        </form>   
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop