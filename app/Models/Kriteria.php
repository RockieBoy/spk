<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;
    public $table = "kriteria";

    protected $primarykey = 'id';

    protected $fillable = [
        'kd_kriteria',
        'nm_kriteria',
        'bobot',
        'jenis',
    ];

}