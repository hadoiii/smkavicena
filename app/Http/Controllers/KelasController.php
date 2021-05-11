<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data_kelas = \App\Models\Kelas::all();
        return view('kelas.index', ['data_kelas' => $data_kelas]);
    }

    public function create(Request $request)
    {
        \App\Models\Kelas::create($request->all());
        return redirect('/kelas')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id)
    {
        $kelas = \App\Models\Kelas::find($id);
        return view('kelas/edit', ['kelas' => $kelas]);
    }

    public function update(Request $request, $id)
    {
        $kelas = \App\Models\Kelas::find($id);
        $kelas->update($request->all());
        return redirect('/kelas')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id)
    {
        $kelas = \App\Models\Kelas::find($id);
        $kelas->delete();
        return redirect('/kelas')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function detail($id)
    {
        $kelas = \App\Models\Kelas::find($id);
        return view('kelas.detail', ['kelas' => $kelas]);
    }
}
