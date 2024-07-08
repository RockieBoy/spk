<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;
    public $table = "alternatif";

    protected $primarykey = 'id';

    protected $fillable = [
        'kd_alternatif',
        'nm_alternatif',
    ];

}