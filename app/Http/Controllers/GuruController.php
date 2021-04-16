<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        /// INSERT KE TABEL USER
        $user = new \App\Models\User;
        $user->role = 'guru';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();
        
        /// INSERT KE TABEL SISWA
        $request->request->add(['user_id' => $user->id]);
        $guru = \App\Models\guru::create($request->all());
        return redirect('/guru')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit($id_guru)
    {
        $guru = \App\Models\Guru::find($id_guru);
        return view('guru/edit', ['guru' => $guru]);
    }

    public function update(Request $request, $id_guru)
    {
        $guru = \App\Models\Guru::find($id_guru);
        $guru->update($request->all());
        
        /// Peng-Upload-an Avatar
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $guru->avatar = $request->file('avatar')->getClientOriginalName();
            $guru->save();
        }

        return redirect('/guru')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete($id_guru)
    {
        $guru = \App\Models\Guru::find($id_guru);
        $guru->delete();
        return redirect('/guru')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function profile($id_guru)
    {
        $guru = \App\Models\Guru::find($id_guru);
        return view('guru.profile', ['guru' => $guru]);
    }
}
