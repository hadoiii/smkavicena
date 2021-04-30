<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;

class SiteController extends Controller
{
    public function home()
    {
        $posts = Post::all();
        return view('sites.home', compact(['posts']));
    }

    public function about()
    {
        return view('sites.about');
    }

    public function register()
    {
        return view('sites.register');
    }

    public function postregister(Request $request)
    {
        /// INSERT KE TABEL USER
        $user = new \App\Models\User;
        $user->role = 'siswa';
        $user->name = $request->nama_depan;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->save();

        /// INSERT KE TABEL SISWA
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());

        /// PENGIRIMAN EMAIL NOTIFIKASI
        \Mail::raw('Selamat datang '.$user->name, function($message) use($user){
            $message->to($user->email ,$user->name);
            $message->subject('Selamat bergabung di keluarga besar SMK Avicena!');
            
        });
        
        return redirect('/login')->with('sukses', 'Pendaftaran Berhasil!');

    }

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=', $slug)->first();
        return view('sites.singlepost', compact(['post']));
    }
}
