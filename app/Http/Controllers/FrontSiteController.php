<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class FrontSiteController extends Controller
{
    public function index()
    {
        $about_id = get_meta_value('_halaman_about');
        $about_data = Halaman::where('id', $about_id)->first();

        return view('frontsite.index')->with([
            'about' => $about_data,
        ]);
    }
}