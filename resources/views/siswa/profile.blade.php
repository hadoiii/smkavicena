@extends('layouts.master')

@section('content')
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
    <!-- NOTIFIKASI KEBERHASILAN INPUT -->
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{session('error')}}
            </div>
        @endif
    <!-- AKHIR NOTIFIKASI -->
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$siswa->getAvatar()}}" width="80px" height="80px" class="img-circle" alt="Avatar">
                            <h3 class="name">{{$siswa->nama_depan}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    {{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    15 <span>Awards</span>
                                </div>
                                <div class="col-md-4 stat-item">
                                    2174 <span>Points</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE HEADER -->
                    <!-- PROFILE DETAIL -->
                    <div class="profile-detail">
                        <div class="profile-info">
                            <h4 class="heading">Informasi Dasar</h4>
                            <ul class="list-unstyled list-justify">
                                <li>NISN <span>{{$siswa->nisn}}</span></li>
                                <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                                <li>TTL <span>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</span></li>
                                <li>Email <span>{{$siswa->email}}</span></li>
                                <li>Nomor Ponsel <span>{{$siswa->no_ponsel}}</span></li>
                                <li>Kelas <span>{{$siswa->kelas}}</span></li>
                            </ul>
                        </div>
                        <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
                    </div>
                    <!-- END PROFILE DETAIL -->
                </div>
                <!-- END LEFT COLUMN -->
                <!-- RIGHT COLUMN -->
                <div class="profile-right">
                    <!-- TABBED CONTENT -->
                    <div class="custom-tabs-line tabs-line-bottom left-aligned">
                        <ul class="nav" role="tablist">
                            <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab" aria-expanded="true">Informasi Lengkap</a></li>
                            <li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Informasi Nilai <span class="badge">{{$siswa->mapel->count()}}</span></a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="tab-bottom-left1">
                        
                        <div class="row">
                            <div class="panel">
                                
                                    
                                    <div class="panel-body">
                                        <table class="table table-hover">
                                            <tr>
                                                <td>Agama </td>
                                                <td>{{$siswa->agama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Golongan Darah </td>
                                                <td>{{$siswa->golongan_darah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat </td>
                                                <td>{{$siswa->alamat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ayah </td>
                                                <td>{{$siswa->nama_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan Ayah </td>
                                                <td>{{$siswa->pekerjaan_ayah}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Ibu </td>
                                                <td>{{$siswa->nama_ibu}}</td>
                                            </tr>
                                            <tr>
                                                <td>Pekerjaan Ibu </td>
                                                <td>{{$siswa->pekerjaan_ibu}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Wali </td>
                                                <td>{{$siswa->nama_wali}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Darurat </td>
                                                <td>{{$siswa->no_darurat}}</td>
                                            </tr>
                                            <tr>
                                                <td>Sekolah Asal </td>
                                                <td>{{$siswa->sekolah_asal}}</td>
                                            </tr>
                                            <tr>
                                                <td>Nomor Ijazah SMP </td>
                                                <td>{{$siswa->no_ijazah_smp}}</td>
                                            </tr> 
                                        
                                        </table>
                                    </div>
                                
                            </div>
                        </div>


                        </div>
                        <div class="tab-pane fade" id="tab-bottom-left2">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        TAMBAH NILAI
                        </button>
                        <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Informasi Nilai</h3>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>MATA PELAJARAN</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</td>
											</tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                            <div class="panel">
                            <div id="chartNilai"></div>
                        </div>
                        </div>
                    </div>
                    <!-- END TABBED CONTENT -->
                </div>
                <!-- END RIGHT COLUMN -->
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT -->
</div>
<!-- Modal Form Pengisian Nilai -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TAMBAH NILAI</h5>
    </div>
      <div class="modal-body">
      <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
            <div class="mb-3">
            <div class="form-group">
                <label for="exampleInputEmail1" class="form-label">Mata Pelajaran</label>
                <select name="mapel" class="form-control" id="mapel" aria-label="Default select example">
                    @foreach($matapelajaran as $mp)
                    <option value="{{$mp->id}}">{{$mp->nama}}</option>
                    @endforeach
                </select>
            </div>
            </div>
            <div class="mb-3">
            <div class="form-group{{$errors->has('nilai') ? ' has-error' : ''}}">
                <label for="exampleInputEmail1" class="form-label">Nilai</label>
                <input name="nilai" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nilai" value="{{old('nilai')}}">
                @if($errors->has('nilai'))
                <span class="help-block">{{$errors->first('nilai')}}</span>
                @endif
            </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
Highcharts.chart('chartNilai', {
  chart: {
    type: 'column'
  },
  title: {
    text: 'GRAFIK NILAI SISWA'
  },
  subtitle: {
    text: 'SMK Avicena Tenjo'
  },
  xAxis: {
    categories: {!!json_encode($categories)!!},
    crosshair: true
  },
  yAxis: {
    min: 0,
    title: {
      text: 'Nilai'
    }
  },
  tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
  },
  plotOptions: {
    column: {
      pointPadding: 0.2,
      borderWidth: 0
    }
  },
  series: [{
    name: 'Nilai',
    data: {!!json_encode($data)!!}

  }]
});
</script>
@stop