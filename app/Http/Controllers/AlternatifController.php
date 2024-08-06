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
            'nm_alternatif'=> 'required',
            'nim'=> 'required ||digits:11',
        ]);
        
        $nim = $request->input('nim');

        $empatdigitakhir = substr($nim, -4);

        $kodealternatif = 'TI-' . $empatdigitakhir;

        Alternatif::create([
            'nim'=>$request->nim,
            'kd_alternatif'=> $kodealternatif,
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
            'nm_alternatif'=> 'required',
            'nim'=>'required ||digits:11',

        ]);

        $nim = $request->input('nim');

        $empatdigitakhir = substr($nim, -4);

        $kodealternatif = 'TI-' . $empatdigitakhir;


        $alternatif->update([
            'nim'=>$request->nim,
            'kd_alternatif'=> $kodealternatif,
            'nm_alternatif'=> $request->nm_alternatif,
            ]);

        return redirect()->route('alternatif.index')->with('success','alternatif berhasil diubah ');
    }


    public function destroy(Alternatif $alternatif)
    {
        
        $alternatif->delete();

        return redirect()->route('alternatif.index')->with('success','Alternatif berhasil dihapus ');
    }

}
