@extends('layouts.master')

@section('header')
@stop
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
                                    {{$siswa->rataRataNilai()}} <span>Rata-Rata Nilai</span>
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
                                <li>Kelas <span>{{$siswa->kelas->nama}}</span></li>
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
                        <div class="panel">
								<!-- TAK PERLU DIGUNAKAN
                                <div class="panel-heading">
									<h3 class="panel-title">Informasi Nilai</h3>
								</div>
                                -->
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>MATA PELAJARAN</th>
												<th>SEMESTER</th>
												<th>NILAI</th>
                                                <th>GURU</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($siswa->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
												<td>{{$mapel->pivot->nilai}}</a></td>
                                                <td>{{$mapel->guru->nama_depan}}</a></td>
                                                </tr>
                                        @endforeach
										</tbody>
									</table>
								</div>
							</div>
                            <!-- Menampilkan Grafik Nilai Siswa -->
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

@stop

@section('footer')

@stop