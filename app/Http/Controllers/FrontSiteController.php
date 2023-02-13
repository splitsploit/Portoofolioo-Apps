<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = Halaman::where('id', $about_id)->first();

        $interest_id = get_meta_value('_halaman_interest');
        $interest_data = Halaman::where('id', $interest_id)->first();

        $award_id = get_meta_value('_halaman_award');
        $award_data = Halaman::where('id', $award_id)->first();

        $experience_data = Riwayat::where('tipe', 'experience')->get();

        return view('frontsite.index')->with([
            'about' => $about_data,
            'interest' => $interest_data,
            'award' => $award_data,
            'experience' => $experience_data,
        ]);
    }
}
