<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Riwayat::where('tipe', 'experience')->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.experience.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experience.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('judul', $request->judul);
        Session::flash('info1', $request->info1);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);
        Session::flash('isi', $request->isi);

        $request->validate([

            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'nullable',
            'isi' => 'required'
        ],
        [
            'judul.required' => 'Judul Wajib Diisi',
            'info1.required' => 'Perusahaan Wajib Diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib Diisi',
            'isi.required' => 'Isian Wajib Diisi'
        ]
    );
        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'tipe' => 'experience',
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
            'isi' => $request->isi,
        ];

        Riwayat::create($data);

        return redirect()->route('experience.index')->with('success', 'Berhasil Menambahkan Data Experience');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
