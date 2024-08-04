<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;

class HasilController extends Controller
{
    public function index()
    {
        // Query data with relationships
        $hasils = Perhitungan::with('alternatif')->get()->toArray();
        
        // Sorting menggunakan usort
        usort($hasils, function($a, $b) {
            return $b['hasil_akhir'] <=> $a['hasil_akhir'];
        });

        foreach ($hasils as $index => $hasil) {
            $hasils[$index]['rank'] = $index + 1;
        }
        
        return view('content.data_hasil.index', compact('hasils'));
    }
}

