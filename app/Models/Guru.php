<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $primaryKey = 'id_guru';
    public $timestamps = FALSE;
    protected $table = 'guru';
    protected $fillable = [
        'nip',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'email',
        'no_ponsel',
        'id_mata_pelajaran'
    ];

    public function getAvatar()
    {
        if(!$this->avatar)
        {
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }
    
}
