<?php

namespace App\Http\Controllers;

use App\Models\MetaData;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            '_foto' => 'mimes:jpeg,jpg,png,gif',
            '_email' => 'required|email',
        ], [
            '_foto.mimes' => 'Foto Yang Diperbolehkan Adalah PNG, JPG, JPEG, dan GIF',
            '_email.required' => 'Email Wajib Diisi',
            '_email.email' => 'Format Email Yang di Masukkan Tidak Valid'
        ]);

        if($request->hasFile('_foto')){
            $foto_file = $request->file('_foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_baru = date('ymdhis') . ".$foto_ekstensi";
            $foto_file->move(public_path('foto'), $foto_baru);

            MetaData::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        MetaData::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->email]);

        return redirect()->route('profile.index')->with('success', 'Berhasil Update Data Profile');

    }
}
