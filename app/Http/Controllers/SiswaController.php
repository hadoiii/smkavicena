<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        /// Fitur Pencarian Pada Navbar
        if($request->has('cari'))
        {
            $data_siswa = \App\Models\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->get();
        }
        else
        {
            $data_siswa = \App\Models\Siswa::all();
        }

        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        \App\Models\Siswa::create($request->all());
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id_siswa)
    {
        $siswa = \App\Models\Siswa::find($id_siswa);
        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, $id_siswa)
    {
        $siswa = \App\Models\Siswa::find($id_siswa);
        $siswa->update($request->all());
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id_siswa)
    {
        $siswa = \App\Models\Siswa::find($id_siswa);
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus!');
    }
}
