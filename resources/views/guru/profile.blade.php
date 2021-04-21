@extends('layouts.master')

@section('content')
<div class="main">
<!-- MAIN CONTENT -->
<div class="main-content">
    <div class="container-fluid">
        <div class="panel panel-profile">
            <div class="clearfix">
                <!-- LEFT COLUMN -->
                <div class="profile-left">
                    <!-- PROFILE HEADER -->
                    <div class="profile-header">
                        <div class="overlay"></div>
                        <div class="profile-main">
                            <img src="{{$guru->getAvatar()}}" width="80px" height="80px" class="img-circle" alt="Avatar">
                            <h3 class="name">{{$guru->nama_depan}}</h3>
                            <span class="online-status status-available">Available</span>
                        </div>
                        <div class="profile-stat">
                            <div class="row">
                                <div class="col-md-4 stat-item">
                                    45 <span>Projects</span>
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
                                <li>NIP <span>{{$guru->nip}}</span></li>
                                <li>Jenis Kelamin <span>{{$guru->jenis_kelamin}}</span></li>
                                <li>TTL <span>{{$guru->tempat_lahir}}, {{$guru->tanggal_lahir}}</span></li>
                                <li>Email <span>{{$guru->email}}</span></li>
                                <li>Nomor Ponsel <span>{{$guru->no_ponsel}}</span></li>
                            </ul>
                        </div>
                        <div class="text-center"><a href="/guru/{{$guru->id}}/edit" class="btn btn-warning">Edit Profile</a></div>
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
                            <li class=""><a href="#tab-bottom-left2" role="tab" data-toggle="tab" aria-expanded="false">Mata Pelajaran Yang Diajar<span class="badge">7</span></a></li>
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
                                                <td>{{$guru->agama}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat </td>
                                                <td>{{$guru->alamat}}</td>
                                            </tr>
                                        </table>
                                    </div>
                                
                            </div>
                        </div>
                       
                        </div>
                        <div class="tab-pane fade" id="tab-bottom-left2">
                            <div class="panel">
								<div class="panel-body">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>KODE</th>
												<th>MATA PELAJARAN</th>
												<th>SEMESTER</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($guru->mapel as $mapel)
											<tr>
												<td>{{$mapel->kode}}</td>
												<td>{{$mapel->nama}}</td>
												<td>{{$mapel->semester}}</td>
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