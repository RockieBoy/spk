<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;
    public $table = "sub_kriteria";

    protected $primarykey = 'id';

    protected $fillable = [
        'kriteria_id',
        'nm_subkriteria',
        'nilai',
    ];

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

}