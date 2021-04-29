<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exports\SiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        
        /// Fitur Pencarian Pada Navbar
        if($request->has('cari'))
        {
            $data_siswa = \App\Models\Siswa::where('nama_depan', 'LIKE', '%'.$request->cari.'%')->paginate(20);
        }
        else
        {
            $data_siswa = \App\Models\Siswa::all();
        }

        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create(Request $request)
    {
        /// VALIDASI INPUT
        $this->validate($request,[
            'nisn' => 'required|unique:siswa',
            'nama_depan' => 'required|min:5',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:siswa',
            'no_ponsel' => 'required',
            'nama_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'nama_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'no_darurat' => 'required',
            'sekolah_asal' => 'required',
            'no_ijazah_smp' => 'required',
            'avatar' => 'mimes:jpg,png',
        ]);

        /// INSERT KE TABEL USER
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        /// INSERT KE TABEL SISWA
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());
        
        /// MENG-UPLOAD AVATAR DI INDEX SISWA
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        } 
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di-input!');
    }

    public function edit(Siswa $siswa)
    {

        return view('siswa/edit', ['siswa' => $siswa]);
    }

    public function update(Request $request, Siswa $siswa)
    {

        $siswa->update($request->all());
        
        /// MENG-UPLOAD AVATAR DI EDIT SISWA
        if($request->hasFile('avatar'))
        {
            $request->file('avatar')->move('images/', $request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses', 'Data Berhasil Di-update!');
    }

    public function delete(Siswa $siswa)
    {
    
        $siswa->delete();
        return redirect('/siswa')->with('sukses', 'Data Berhasil Dihapus!');
    }

    public function profile(Siswa $siswa)
    {
        //$siswa = \App\Models\Siswa::find($id);
        $matapelajaran = \App\Models\Mapel::all();

        // Menyiapkan Data Untuk Grafik
        $categories = [];
        $data = [];

        foreach($matapelajaran as $mp)
            {
                if($siswa->mapel()->wherePivot('mapel_id', $mp->id)->first())
                {
                    $categories[] = $mp->nama;
                    $data[] = $siswa->mapel()->wherePivot('mapel_id', $mp->id)->first()->pivot->nilai;
                }
            }
        return view('siswa.profile', ['siswa' => $siswa, 'matapelajaran' => $matapelajaran, 'categories' => $categories, 'data' => $data]);
    }

    public function addnilai(Request $request, Siswa $siswa)
    {
        
        /// Pengecekan, apakah nilai mata pelajaran sudah terisi sebelumnya?
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists())
        {
            return redirect('siswa/'.$siswa->id.'/profile')->with('error', 'Data nilai sudah ada!');
        }
        $siswa->mapel()->attach($request->mapel, ['nilai' => $request->nilai]);

        return redirect('siswa/'.$siswa->id.'/profile')->with('sukses', 'Data nilai berhasil di-input!');
    }

    public function deletenilai(Siswa $siswa, $idmapel)
    {
        
        $siswa->mapel()->detach($siswa->id);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus!');
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf() 
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf', ['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function getdatasiswa() 
    {
        $siswa = Siswa::select('siswa.*');
        
        return \DataTables::eloquent($siswa)
        ->addColumn('nama_lengkap', function($s){
            return $s->nama_depan.' '.$s->nama_belakang;
        })
        ->addColumn('rata2_nilai', function($s){
            return $s->rataRataNilai();
        })
        ->addColumn('aksi', function($s){
            return '<a href="/siswa/'.$s->id.'/profile/" class="btn btn-warning btn-sm">Edit</a>';
        })
        ->rawColumns(['nama_lengkap','rata2_nilai','aksi'])
        ->toJson();
    }

    public function profilsaya()
    {
        $siswa = auth()->user()->siswa;
        return view('siswa.profilsaya', compact(['siswa']));
    }
}
