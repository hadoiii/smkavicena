<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    public $timestamps = FALSE;
    protected $table = 'kelas';
    protected $fillable = [
        'kode',
        'nama',
        ];
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    
}
