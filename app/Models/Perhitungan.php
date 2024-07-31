<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perhitungan extends Model
{
    use HasFactory;

    protected $fillable = ['alternatif_id', 'hasil_akhir'];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
