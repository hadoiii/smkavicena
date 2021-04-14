<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(Request $request)
    {
        
        $data_mapel = \App\Models\Mapel::all();
        return view('mapel.index', ['data_mapel' => $data_mapel]);
    }

    public function create(Request $request)
    {
        \App\Models\Mapel::create($request->all());
        return redirect('/mapel')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id_mata_pelajaran)
    {
        $mapel = \App\Models\Mapel::find($id_mata_pelajaran);
        return view('mapel/edit', ['mapel' => $mapel]);
    }

    public function update(Request $request, $id_mata_pelajaran)
    {
        $mapel = \App\Models\Mapel::find($id_mata_pelajaran);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id_mata_pelajaran)
    {
        $mapel = \App\Models\Mapel::find($id_mata_pelajaran);
        $mapel->delete();
        return redirect('/mapel')->with('sukses', 'Data Berhasil Dihapus!');
    }
}
