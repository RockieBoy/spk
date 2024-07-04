<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use Illuminate\Http\Request;


class KriteriaController extends Controller
{
    public function index()
    {

        $kriterium = Kriteria::orderBy('id','asc')->get();
        return view('content.data_kriteria.index',compact('kriterium'));
    }


    public function create()
    {
        return view('content.data_kriteria.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kd_kriteria'=> 'required',
            'nm_kriteria'=> 'required',
            'bobot'=> 'required',
            'jenis'=> 'required',
        ]);

        Kriteria::create([
            'kd_kriteria'=> $request->kd_kriteria,
            'nm_kriteria'=> $request->nm_kriteria,
            'bobot'=> $request->bobot,
            'jenis'=> $request->jenis,
        ]);
        return redirect()->route('kriterium.index') ->with('success','Kriteria Berhasil Dibuat.');
    }


    public function edit(Kriteria $kriterium)
    {
        return view('content.data_kriteria.edit',compact('kriterium'));
    }

    public function update(Request $request, Kriteria $kriterium)
    {
        $request->validate([
            'kd_kriteria'=> 'required',
            'nm_kriteria'=> 'required',
            'bobot'=> 'required',
            'jenis'=> 'required',
        ]);

        $kriterium->update([
                'kd_kriteria' => $request->kd_kriteria,
                'nm_kriteria' => $request->nm_kriteria,
                'bobot' => $request->bobot,
                'jenis' => $request->jenis,
            ]);

        return redirect()->route('kriterium.index')->with('success','Kriteria berhasil diubah ');
    }


    public function destroy(Kriteria $kriterium)
    {
        
        $kriterium->delete();

        return redirect()->route('kriterium.index')->with('success','Kriteria berhasil dihapus ');
    }

}
