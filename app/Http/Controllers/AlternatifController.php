<?php

namespace App\Http\Controllers;
use App\Models\Alternatif;
use Illuminate\Http\Request;


class AlternatifController extends Controller
{
    public function index()
    {

        $alternatif = Alternatif::orderBy('id','asc')->get();
        return view('content.data_alternatif.index',compact('alternatif'));
    }


    public function create()
    {
        return view('content.data_alternatif.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'kd_alternatif'=> 'required',
            'nm_alternatif'=> 'required',
        ]);

        Alternatif::create([
            'kd_alternatif'=> $request->kd_alternatif,
            'nm_alternatif'=> $request->nm_alternatif,
        ]);
        return redirect()->route('alternatif.index') ->with('success','Alternatif Berhasil Dibuat.');
    }


    public function edit(Alternatif $alternatif)
    {
        return view('content.data_alternatif.edit',compact('alternatif'));
    }

    public function update(Request $request, Alternatif $alternatif)
    {
        $request->validate([
            'kd_alternatif'=> 'required',
            'nm_alternatif'=> 'required',

        ]);

        $alternatif->update([
                'kd_alternatif' => $request->kd_alternatif,
                'nm_alternatif' => $request->nm_alternatif,
            ]);

        return redirect()->route('alternatif.index')->with('success','alternatif berhasil diubah ');
    }


    public function destroy(Alternatif $alternatif)
    {
        
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success','Alternatif berhasil dihapus ');
    }

}
