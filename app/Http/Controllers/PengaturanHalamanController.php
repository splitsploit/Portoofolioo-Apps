<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\MetaData;
use Illuminate\Http\Request;

class PengaturanHalamanController extends Controller
{
    public function index()
    {
        $dataHalaman = Halaman::orderBy('judul', 'asc')->get();
        return view('dashboard.pengaturan-halaman.index', compact('dataHalaman'));
    }

    public function update(Request $request)
    {
        MetaData::updateOrCreate(['meta_key' => '_halaman_about'], ['meta_value' => $request->_halaman_about]);

        return redirect()->route('pengaturan-halaman.index')->with('success', 'Berhasil Update Data Pengaturan Halaman');
    }
}
