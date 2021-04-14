<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $primaryKey = 'id_mata_pelajaran';
    public $timestamps = FALSE;
    protected $table = 'mata_pelajaran';
    protected $fillable = [
        'id_mata_pelajaran',
        'nama_mata_pelajaran'
        ];
}
