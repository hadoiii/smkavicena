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

    public function edit($id)
    {
        $mapel = \App\Models\Mapel::find($id);
        return view('mapel/edit', ['mapel' => $mapel]);
    }

    public function update(Request $request, $id)
    {
        $mapel = \App\Models\Mapel::find($id);
        $mapel->update($request->all());
        return redirect('/mapel')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id)
    {
        $mapel = \App\Models\Mapel::find($id);
        $mapel->delete();
        return redirect('/mapel')->with('sukses', 'Data Berhasil Dihapus!');
    }
}
