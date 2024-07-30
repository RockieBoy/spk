<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Alternatif;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(Alternatif $alternatif)
    {
        $penilaian = $alternatif->penilaian()->with('kriteria')->get();
        
        $hasPenilaian = $penilaian->isNotEmpty();

        return view('content.data_penilaian.index', compact('alternatif', 'penilaian', 'hasPenilaian'));
    }

    public function create(Alternatif $alternatif)
    {
        $kriteria = Kriteria::with('subkriteria')->get();
        return view('content.data_penilaian.create', compact('kriteria', 'alternatif'));
    }

    public function store(Request $request, Alternatif $alternatif)
    {
        \Log::info('Request data:', $request->all());

        $request->validate([
            'kriteria' => 'required|array',
            'kriteria.*' => 'required|exists:sub_kriteria,id',
        ]);

        \Log::info('Kriteria data:', $request->kriteria);

        foreach ($request->kriteria as $kriteriaId => $subkriteriaId) {
            \Log::info('Processing Kriteria:', ['kriteriaId' => $kriteriaId, 'subkriteriaId' => $subkriteriaId]);

            $nilaiSubkriteria = Subkriteria::where('id', $subkriteriaId)->value('nilai');

            Penilaian::create([
                'alternatif_id' => $alternatif->id,
                'kriteria_id' => $kriteriaId,
                'subkriteria_id' => $subkriteriaId,
                'nilai' => $nilaiSubkriteria,
            ]);
        }

        return redirect()->route('alternatif.penilaians.index', $alternatif)->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function edit(Alternatif $alternatif)
    {
        $kriteria = Kriteria::with('subkriteria')->get();
        $penilaian = $alternatif->penilaian()->pluck('subkriteria_id', 'kriteria_id')->toArray();
        return view('content.data_penilaian.edit', compact('kriteria', 'alternatif', 'penilaian'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'kriteria' => 'required|array',
            'kriteria.*' => 'required|exists:sub_kriteria,id',
        ]);

        foreach ($request->kriteria as $kriteriaId => $subkriteriaId) {
            $nilaiSubkriteria = Subkriteria::where('id', $subkriteriaId)->value('nilai');

            Penilaian::updateOrCreate(
                ['alternatif_id' => $alternatif->id, 'kriteria_id' => $kriteriaId],
                ['subkriteria_id' => $subkriteriaId, 'nilai' => $nilaiSubkriteria]
            );
        }

        return redirect()->route('alternatif.penilaians.index', $alternatif)->with('success', 'Penilaian berhasil diupdate.');
    }

    public function destroy(Alternatif $alternatif)
{
    
    Penilaian::where('alternatif_id', $alternatif->id)->delete();

    return redirect()->route('alternatif.penilaians.index', $alternatif)->with('success', 'Semua penilaian berhasil dihapus.');
}
}
