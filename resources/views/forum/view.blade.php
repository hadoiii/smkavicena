@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-headline">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{$forum->judul}}</h3>
                            <p class="panel-subtitle">{{$forum->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="panel-body">
                            <p>{{$forum->konten}}</p>
                            <hr>
                            <!-- Kolom Komentar -->
                            <div class="btn-group">
                                <button class="btn-default"><i class="lnr lnr-thumbs-up"></i> Suka</button>
                                <button class="btn-default" id="btn-komentar-utama"><i class="lnr lnr-bubble"></i> Komentar</button>
                            </div>
                            <form action="" style="margin-top: 10px; display: none;" id="komentar-utama" method="POST">
                                @csrf
                                <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                <input type="hidden" name="parent" value="0">
                                <textarea name="konten" class="form-control" id="komentar-utama" rows="4"></textarea>
                                <input type="submit" class="btn btn-sm btn-primary" value="Kirim">
                            </form>
                            <h4>Komentar</h4>
                            <ul class="list-unstyled activity-list">
                                @foreach($forum->komentar()->where('parent', 0)->orderBy('created_at', 'desc')->get() as $komentar)
                                <li>
                                    <img src="{{$komentar->user->siswa->getAvatar()}}" alt="Avatar" class="img-circle pull-left avatar">
                                    <p><a href="#">{{$komentar->user->siswa->nama_lengkap()}}</a> {{$komentar->konten}} <span class="timestamp">{{$komentar->created_at->diffForHumans()}}</span></p>
                                <form action="" style="padding-left: 3.5em" method="POST">
                                @csrf
                                <input type="hidden" name="forum_id" value="{{$forum->id}}">
                                <input type="hidden" name="parent" value="{{$komentar->id}}">
                                <input type="text" name="konten" class="form-control">
                                <input type="submit" class="btn btn-primary btn-xs" value="Kirim">
                                </form>
                                <br>
                                @foreach($komentar->childs as $child)
                                <p><a href="#">{{$child->user->siswa->nama_lengkap()}}</a> {{$child->konten}} <span class="timestamp">{{$child->created_at->diffForHumans()}}</span></p>
                                @endforeach
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
@stop

@section('footer')
    <script>
        $(document).ready(function(){
            $('#btn-komentar-utama').click(function(){
                $('#komentar-utama').toggle('slide');
            });
        });
    </script>
@endsection