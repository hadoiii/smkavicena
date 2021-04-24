@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3 class="section-title">FORMULIR REGISTRASI</h3>
            <p>
            Isilah formulir di bawah ini dengan data yang sebenar-benarnya.
            </p>
            
            {!! Form::open(['url' => '/postregister']) !!}
                <div class="form-group">
                    <label>NISN</label>
                    {!! Form::text('nisn', '', ['class' => 'form-control', 'placeholder' => 'NISN']); !!}
                </div>
                <div class="form-group">
                    <label>Nama Depan</label>
                    {!! Form::text('nama_depan', '', ['class' => 'form-control', 'placeholder' => 'Nama Depan']); !!}
                </div>
                <div class="form-group">
                    <label>Nama Belakang</label>
                    {!! Form::text('nama_belakang', '', ['class' => 'form-control', 'placeholder' => 'Nama Belakang']); !!}
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin (Pria / Wanita)</label>
                    {!! Form::text('jenis_kelamin', '', ['class' => 'form-control', 'placeholder' => 'Pria / Wanita']); !!}
                </div>
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    {!! Form::text('tempat_lahir', '', ['class' => 'form-control', 'placeholder' => 'Tempat Lahir']); !!}
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    {!! Form::date('tanggal_lahir', '', ['class' => 'form-control']); !!}
                </div>
                <div class="form-group">
                    <label>Agama</label>
                    {!! Form::text('agama', '', ['class' => 'form-control', 'placeholder' => 'Agama']); !!}
                </div>
                <div class="form-group">
                    <label>Golongan Darah</label>
                    {!! Form::text('golongan_darah', '', ['class' => 'form-control', 'placeholder' => 'A / B / AB / O']); !!}
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    {!! Form::textarea('alamat', '', ['class' => 'form-control', 'placeholder' => 'Alamat']); !!}
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            {!! Form::email('email', '', ['class' => 'form-control', 'placeholder' => 'Email']); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']); !!}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Nomor Ponsel</label>
                    {!! Form::text('no_ponsel', '', ['class' => 'form-control', 'placeholder' => 'Nomor Ponsel']); !!}
                </div>
                <div class="form-group">
                    <label>Nama Ayah</label>
                    {!! Form::text('nama_ayah', '', ['class' => 'form-control', 'placeholder' => 'Nama Ayah']); !!}
                </div>
                <div class="form-group">
                    <label>Pekerjaan Ayah</label>
                    {!! Form::text('pekerjaan_ayah', '', ['class' => 'form-control', 'placeholder' => 'Pekerjaan Ayah']); !!}
                </div>
                <div class="form-group">
                    <label>Nama Ibu</label>
                    {!! Form::text('nama_ibu', '', ['class' => 'form-control', 'placeholder' => 'Nama Ibu']); !!}
                </div>
                <div class="form-group">
                    <label>Pekerjaan Ibu</label>
                    {!! Form::text('pekerjaan_ibu', '', ['class' => 'form-control', 'placeholder' => 'Pekerjaan Ibu']); !!}
                </div>
                <div class="form-group">
                    <label>Nama Wali</label>
                    {!! Form::text('nama_wali', '', ['class' => 'form-control', 'placeholder' => 'Nama Wali']); !!}
                </div>
                <div class="form-group">
                    <label>Nomor Darurat</label>
                    {!! Form::text('no_darurat', '', ['class' => 'form-control', 'placeholder' => 'Nomor Darurat']); !!}
                </div>
                <div class="form-group">
                    <label>Sekolah Asal</label>
                    {!! Form::text('sekolah_asal', '', ['class' => 'form-control', 'placeholder' => 'Sekolah Asal']); !!}
                </div>
                <div class="form-group">
                    <label>Nomor Ijazah SMP</label>
                    {!! Form::text('no_ijazah_smp', '', ['class' => 'form-control', 'placeholder' => 'Nomor Ijazah SMP']); !!}
                </div>
                <button type="submit" class="btn btn-two">Send message</button><p><br/></p>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@stop