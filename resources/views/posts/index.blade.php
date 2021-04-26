@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">POSTINGAN</h3>
                             <!-- Button trigger modal -->
                             <div class="right">
                             <a href="{{route('posts.add')}}" class="btn btn-primary btn-sm">Postingan Baru</a>
                             </div>
                        </div>
                        <div class="panel-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th>ID</th>
                                    <th>JUDUL</th>
                                    <th>USER</th>
                                    <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->user->name}}</td>
                                    <td><a target="_blank" href="{{route('site.single.post', $post->slug)}}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="#" class="btn btn-danger btn-sm class delete">Hapus</a></td>
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

@section('footer')
    <script>
        $('.delete').click(function(){
            var siswa_id = $(this).attr('siswa-id');
            swal({
                title: "Yakin nih?",
                text: "Beneran mau dihapus data siswa dengan id "+siswa_id+" ini",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    console.log(willDelete);
                    if (willDelete) {
                    window.location = "/siswa/"+siswa_id+"/delete";
                    }
                });
            
        });
    </script>
@stop