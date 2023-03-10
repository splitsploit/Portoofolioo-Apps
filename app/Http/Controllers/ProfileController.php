<?php

namespace App\Http\Controllers;

use App\Models\MetaData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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

            // hapus foto lama, jika ada update foto baru
            $foto_lama = get_meta_value('_foto');
            File::delete(public_path('foto') . '/' . $foto_lama);

            MetaData::updateOrCreate(['meta_key' => '_foto'], ['meta_value' => $foto_baru]);
        }

        MetaData::updateOrCreate(['meta_key' => '_kota'], ['meta_value' => $request->_kota]);
        MetaData::updateOrCreate(['meta_key' => '_provinsi'], ['meta_value' => $request->_provinsi]);
        MetaData::updateOrCreate(['meta_key' => '_nohp'], ['meta_value' => $request->_nohp]);
        MetaData::updateOrCreate(['meta_key' => '_email'], ['meta_value' => $request->_email]);
        MetaData::updateOrCreate(['meta_key' => '_facebook'], ['meta_value' => $request->_facebook]);
        MetaData::updateOrCreate(['meta_key' => '_twitter'], ['meta_value' => $request->_twitter]);
        MetaData::updateOrCreate(['meta_key' => '_linkedin'], ['meta_value' => $request->_linkedin]);
        MetaData::updateOrCreate(['meta_key' => '_github'], ['meta_value' => $request->_github]);

        return redirect()->route('profile.index')->with('success', 'Berhasil Update Data Profile');

    }
}
