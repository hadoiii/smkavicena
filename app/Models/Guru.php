<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    
    public $timestamps = FALSE;
    protected $table = 'guru';
    protected $fillable = [
        'user_id',
        'nip',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'email',
        'no_ponsel'
    ];

    public function getAvatar()
    {
        if(!$this->avatar)
        {
            return asset('images/default.jpg');
        }
        return asset('images/'.$this->avatar);
    }

    public function mapel()
    {
        return $this->hasMany(Mapel::class);
    }
    
}
