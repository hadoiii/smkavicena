@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Inputs</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/guru/{{$guru->id_guru}}/update" method="POST">
                            {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NIP</label>
                                    <input name="nip" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="NIP" value="{{$guru->nip}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                    <input name="nama_depan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$guru->nama_depan}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                    <input name="nama_belakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$guru->nama_belakang}}">
                                </div>
                                <br>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example">
                                    <option selected>Pilih Jenis Kelamin</option>
                                    <option value="Pria" @if ($guru->jenis_kelamin == "Pria") selected @endif>Pria</option>
                                    <option value="Wanita" @if ($guru->jenis_kelamin == "Wanita") selected @endif>Wanita</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tempat Lahir" value="{{$guru->tempat_lahir}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tanggal Lahir" value="{{$guru->tanggal_lahir}}">
                                </div>
                                <br>
                                <select name="agama" class="form-control" aria-label="Default select example">
                                    <option selected>Agama</option>
                                    <option value="Islam" @if ($guru->agama == "Islam") selected @endif>Islam</option>
                                    <option value="Kristen" @if ($guru->agama == "Kristen") selected @endif>Kristen</option>
                                    <option value="Katholik" @if ($guru->agama == "Katholik") selected @endif>Katholik</option>
                                    <option value="Hindu" @if ($guru->agama == "Hindu") selected @endif>Hindu</option>
                                    <option value="Budha" @if ($guru->agama == "Budha") selected @endif>Budha</option>
                                    <option value="Kong Hu Chu" @if ($guru->agama == "Kong Hu Chu") selected @endif>Kong Hu Chu</option>
                                </select>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat">{{$guru->alamat}}</textarea>
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{$guru->email}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nomor Ponsel</label>
                                    <input name="no_ponsel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nomor Ponsel" value="{{$guru->no_ponsel}}">
                                </div>
                                <br>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID Mata Pelajaran</label>
                                    <input name="id_mata_pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kelas" value="{{$guru->id_mata_pelajaran}}">
                                </div>
                                <br>
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