<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    public function index(Kriteria $kriterium)
    {
        $subkriteria = $kriterium->subkriteria;
        return view('content.data_sub_kriteria.index', compact('kriterium', 'subkriteria'));

    }

    public function create(Kriteria $kriterium)
    {
        return view('content.data_sub_kriteria.create', compact('kriterium'));
    }

    public function store(Request $request, Kriteria $kriterium)
    {
        $request->validate([
            'nm_subkriteria' => 'required',
            'nilai' => 'required|numeric',
        ]);

        $kriterium->subkriteria()->create([
            'nm_subkriteria' => $request->input('nm_subkriteria'),
            'nilai' => $request->input('nilai'),
        ]);
        return redirect()->route('kriterium.subkriterias.index', $kriterium);
    }

    public function edit(Kriteria $kriterium, Subkriteria $subkriteria)
    {
        return view('content.data_sub_kriteria.edit', compact('kriterium', 'subkriteria'));
    }

    public function update(Request $request, Kriteria $kriterium, Subkriteria $subkriteria)
    {
        $request->validate([
            'nm_subkriteria' => 'required',
            'nilai' => 'required|numeric',
        ]);

        $subkriteria->update([
            'nm_subkriteria' => $request->input('nm_subkriteria'),
            'nilai' => $request->input('nilai'),
        ]);
        return redirect()->route('kriterium.subkriterias.index', $kriterium);
    }

    public function destroy(Kriteria $kriterium, Subkriteria $subkriteria)
    {
        $subkriteria->delete();
        return redirect()->route('kriterium.subkriterias.index', $kriterium);
    }
}
