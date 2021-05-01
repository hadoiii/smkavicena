@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">FORUM</h3>
                             <div class="right">
                             <!-- Button trigger modal -->
                             <a href type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-primary">Tambah Forum</a>
                             </div>
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled activity-list">
                                @foreach($forum as $frm)
                                <li>
                                    <img src="{{$frm->user->siswa->getAvatar()}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="/forum/{{$frm->id}}/view">{{$frm->user->siswa->nama_depan}} telah membuat forum baru dengan nama {{$frm->judul}} </a><span class="timestamp">{{$frm->created_at->diffForHumans()}}</span></p>
                                </li>
                                @endforeach
							</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH FORUM -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">TAMBAH FORUM</h5>
            <div class="modal-body">
            <form action="/forum/create" method="POST">
            {{csrf_field()}}
                <div class="mb-3">
                    <div class="form-group{{$errors->has('judul') ? ' has-error' : ''}}">
                        <label for="exampleInputEmail1" class="form-label">Judul Forum</label>
                        <input name="judul" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Judul" value="{{old('judul')}}">
                        @if($errors->has('judul'))
                        <span class="help-block">{{$errors->first('judul')}}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-group{{$errors->has('content') ? ' has-error' : ''}}">
                        <label for="exampleFormControlTextarea1" class="form-label">Konten</label>
                            <textarea name="konten" class="form-control" id="content" rows="3" placeholder="Masukkan Konten"></textarea>
                            @if($errors->has('content'))
                            <span class="help-block">{{$errors->first('content')}}</span>
                            @endif
                    </div>
                </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        </div>
    </div>
</div>
@stop