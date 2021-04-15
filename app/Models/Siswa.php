<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $primaryKey = 'id_siswa';
    protected $table = 'siswa';
    protected $fillable = [
        'nisn',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'golongan_darah',
        'alamat',
        'email',
        'no_ponsel',
        'kelas',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'nama_wali',
        'no_darurat',
        'sekolah_asal',
        'no_ijazah_smp',
        'avatar'
    ];

    public function getAvatar()
    {
        if(!$this->avatar)
        {
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function kelas()
    {
        return $this->belongsTo(Mapel::class);
    }
}
