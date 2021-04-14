@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">EDIT DATA MATA PELAJARAN</h3>
                    </div>
                    <div class="panel-body">
                        <form action="/mapel/{{$mapel->id_mata_pelajaran}}/update" method="POST">
                            {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">KODE MATA PELAJARAN</label>
                                    <input name="id_mata_pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Kode Mata Pelajaran" value="{{$mapel->id_mata_pelajaran}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NAMA MATA PELAJARAN</label>
                                    <input name="nama_mata_pelajaran" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Mata Pelajaran" value="{{$mapel->nama_mata_pelajaran}}">
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