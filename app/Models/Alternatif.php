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
        'nim',
        'nm_alternatif',
    ];
    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}