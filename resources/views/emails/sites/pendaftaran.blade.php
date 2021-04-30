@component('mail::message')
# Pendaftaran Siswa

Selamat bergabung di keluarga besar SMK Avicena!

@component('mail::button', ['url' => 'http://hadiwiyono.com'])
Klik Di sini
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
