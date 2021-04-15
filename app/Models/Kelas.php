<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $primaryKey = 'id_kelas';
    public $timestamps = FALSE;
    protected $table = 'kelas';
    protected $fillable = [
        'nama_kelas',
        ];
    public function siswa()
    {
        return $this->belongsToMany(Siswa::class);
    }
}
