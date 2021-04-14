<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        /// Fitur Pencarian Pada Navbar
        if($request->has('cari'))
        {
            $data_guru = \App\Models\Guru::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else
        {
            $data_guru = \App\Models\Guru::all();
            $data_mapel = \App\Models\Mapel::all();
        }

        return view('guru.index', ['data_guru' => $data_guru], ['data_mapel' => $data_mapel]);
    }

    public function create(Request $request)
    {
        \App\Models\guru::create($request->all());
        return redirect('/guru')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id)
    {
        $guru = \App\Models\Guru::find($id);
        return view('guru/edit', ['guru' => $guru]);
    }

    public function update(Request $request, $id)
    {
        $guru = \App\Models\Guru::find($id);
        $guru->update($request->all());
        return redirect('/guru')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id)
    {
        $guru = \App\Models\Guru::find($id);
        $guru->delete();
        return redirect('/guru')->with('sukses', 'Data Berhasil Dihapus!');
    }
}
