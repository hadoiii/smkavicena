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
                                    <th>EMAIL</th>
                                    <th>RERATA NILAI</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data_siswa as $siswa)
                                <tr>
                                    <td>{{$siswa->nisn}}</td>
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_depan}}</a></td>
                                    <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->nama_belakang}}</a></td>
                                    <td>{{$siswa->jenis_kelamin}}</td>
                                    <td>{{$siswa->alamat}}</td>
                                    <td>{{$siswa->email}}</td>
                                    <td>{{$siswa->rataRataNilai()}}</td>
                                    <td><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
                                    <td><a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin nih mau dihapus?')">Hapus</a></td>
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
                <div class="form-group{{$errors->has('nisn') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">NISN</label>
                    <input name="nisn" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NISN" value="{{old('nisn')}}">
                    @if($errors->has('nisn'))
                    <span class="help-block">{{$errors->first('nisn')}}</span>
                    @endif
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group{{$errors->has('nama_depan') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                    @if($errors->has('nama_depan'))
                    <span class="help-block">{{$errors->first('nama_depan')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                </div>
                <br>
                <div class="form-group{{$errors->has('jenis_kelamin') ? ' has-error' : ''}}">
                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                    <option selected>Pilih Jenis Kelamin</option>
                    <option value="Pria" {{(old('jenis_kelamin') == 'Pria') ? ' selected' : ''}}>Pria</option>
                    <option value="Wanita" {{(old('jenis_kelamin') == 'Wanita') ? ' selected' : ''}}>Wanita</option>
                </select>
                    @if($errors->has('jenis_kelamin'))
                    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                    @endif
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('tempat_lahir') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{old('tempat_lahir')}}">
                    @if($errors->has('tempat_lahir'))
                    <span class="help-block">{{$errors->first('tempat_lahir')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('tanggal_lahir') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                    <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir" value="{{old('tanggal_lahir')}}">
                    @if($errors->has('tanggal_lahir'))
                    <span class="help-block">{{$errors->first('tanggal_lahir')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="form-group{{$errors->has('agama') ? ' has-error' : ''}}">
                <select name="agama" class="form-control" aria-label="Default select example">
                    <option selected>Agama</option>
                    <option value="Islam" {{(old('agama') == 'Islam') ? ' selected' : ''}}>Islam</option>
                    <option value="Kristen" {{(old('agama') == 'Kristen') ? ' selected' : ''}}>Kristen</option>
                    <option value="Katholik" {{(old('agama') == 'Katholik') ? ' selected' : ''}}>Katholik</option>
                    <option value="Hindu" {{(old('agama') == 'Hindu') ? ' selected' : ''}}>Hindu</option>
                    <option value="Budha" {{(old('agama') == 'Budha') ? ' selected' : ''}}>Budha</option>
                    <option value="Kong Hu Chu" {{(old('agama') == 'Kong Hu Chu') ? ' selected' : ''}}>Kong Hu Chu</option>
                </select>
                    @if($errors->has('agama'))
                    <span class="help-block">{{$errors->first('agama')}}</span>
                    @endif
                </div>
                <br>
                <div class="form-group{{$errors->has('golongan_darah') ? ' has-error' : ''}}">
                <select name="golongan_darah" class="form-control" aria-label="Default select example">
                    <option selected>Golongan Darah</option>
                    <option value="A" {{(old('golongan_darah') == 'A') ? ' selected' : ''}}>A</option>
                    <option value="B" {{(old('golongan_darah') == 'B') ? ' selected' : ''}}>B</option>
                    <option value="AB" {{(old('golongan_darah') == 'AB') ? ' selected' : ''}}>AB</option>
                    <option value="O" {{(old('golongan_darah') == 'O') ? ' selected' : ''}}>O</option>
                </select>
                    @if($errors->has('golongan_darah'))
                    <span class="help-block">{{$errors->first('golongan_darah')}}</span>
                    @endif
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('alamat') ? ' has-error' : ''}}">
                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{old('alamat')}}</textarea>
                    @if($errors->has('alamat'))
                    <span class="help-block">{{$errors->first('alamat')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                    @if($errors->has('email'))
                    <span class="help-block">{{$errors->first('email')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('no_ponsel') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                    <input name="no_ponsel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ponsel" value="{{old('no_ponsel')}}">
                    @if($errors->has('no_ponsel'))
                    <span class="help-block">{{$errors->first('no_ponsel')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Kelas</label>
                    <input name="kelas" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{old('kelas')}}">
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('nama_ayah') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nama Ayah</label>
                    <input name="nama_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ayah" value="{{old('nama_ayah')}}">
                    @if($errors->has('nama_ayah'))
                    <span class="help-block">{{$errors->first('nama_ayah')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('pekerjaan_ayah') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ayah</label>
                    <input name="pekerjaan_ayah" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ayah" value="{{old('pekerjaan_ayah')}}">
                    @if($errors->has('pekerjaan_ayah'))
                    <span class="help-block">{{$errors->first('pekerjaan_ayah')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('nama_ibu') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nama Ibu</label>
                    <input name="nama_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Ibu" value="{{old('nama_ibu')}}">
                    @if($errors->has('nama_ibu'))
                    <span class="help-block">{{$errors->first('nama_ibu')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('pekerjaan_ibu') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Pekerjaan Ibu</label>
                    <input name="pekerjaan_ibu" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Pekerjaan Ibu" value="{{old('pekerjaan_ibu')}}">
                    @if($errors->has('pekerjaan_ibu'))
                    <span class="help-block">{{$errors->first('pekerjaan_ibu')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group">
                    <label for="exampleInputEmail1" class="form-label">Nama Wali</label>
                    <input name="nama_wali" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Wali" value="{{old('no_darurat')}}">
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('no_darurat') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nomor Darurat</label>
                    <input name="no_darurat" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Darurat" value="{{old('no_darurat')}}">
                    @if($errors->has('no_darurat'))
                    <span class="help-block">{{$errors->first('no_darurat')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('sekolah_asal') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Sekolah Asal</label>
                    <input name="sekolah_asal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sekolah Asal" value="{{old('sekolah_asal')}}">
                    @if($errors->has('sekolah_asal'))
                    <span class="help-block">{{$errors->first('sekolah_asal')}}</span>
                    @endif
                </div>
                </div>
                <br>
                <div class="mb-3">
                <div class="form-group{{$errors->has('no_ijazah_smp') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Nomor Ijazah SMP</label>
                    <input name="no_ijazah_smp" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ijazah SMP" value="{{old('no_ijazah_smp')}}">
                    @if($errors->has('no_ijazah_smp'))
                    <span class="help-block">{{$errors->first('no_ijazah_smp')}}</span>
                    @endif
                </div>
                </div>
                <div class="mb-3">
                <div class="form-group{{$errors->has('avatar') ? ' has-error' : ''}}">
                    <label for="exampleInputEmail1" class="form-label">Avatar</label>
                    <input name="avatar" type="file" class="form-control">
                </div>
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