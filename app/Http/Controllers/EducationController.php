<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Riwayat::where('tipe', 'education')->orderBy('tgl_akhir', 'desc')->get();
        return view('dashboard.education.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.education.create');
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
        Session::flash('info2', $request->info2);
        Session::flash('info3', $request->info3);
        Session::flash('tgl_mulai', $request->tgl_mulai);
        Session::flash('tgl_akhir', $request->tgl_akhir);

        $request->validate([

            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',

        ],
        [
            'judul.required' => 'Judul Wajib Diisi',
            'info1.required' => 'Perusahaan Wajib Diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib Diisi',
        ]
    );
        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => 'education',
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];

        Riwayat::create($data);

        return redirect()->route('education.index')->with('success', 'Berhasil Menambahkan Data Education');
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
        $data = Riwayat::where('id', $id)->where('tipe', 'education')->first();

        return view('dashboard.education.edit', compact('data'));
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
        $request->validate([

            'judul' => 'required',
            'info1' => 'required',
            'tgl_mulai' => 'required',
            'tgl_akhir' => 'nullable',
        ],
        [
            'judul.required' => 'Judul Wajib Diisi',
            'info1.required' => 'Universitas Wajib Diisi',
            'info2.required' => 'Fakultas Wajib Diisi',
            'info3.required' => 'Prodi Wajib Diisi',
            'tgl_mulai.required' => 'Tanggal Mulai Wajib Diisi',
        ]
    );
        $data = [
            'judul' => $request->judul,
            'info1' => $request->info1,
            'info2' => $request->info2,
            'info3' => $request->info3,
            'tipe' => 'education',
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_akhir' => $request->tgl_akhir,
        ];
        
        Riwayat::where('id', $id)->update($data);

        return redirect()->route('education.index')->with('success', 'Berhasil Update Data Education');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Riwayat::where('id', $id)->where('tipe', 'education')->delete();

        return redirect()->route('education.index')->with('success', 'Berhasil Hapus Data Education');
    }
}
