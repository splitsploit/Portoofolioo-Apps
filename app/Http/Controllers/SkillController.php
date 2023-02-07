<?php

namespace App\Http\Controllers;

use App\Models\MetaData;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skill_url = public_path('admin/devicon.json');
        $skill_data = file_get_contents($skill_url);
        $skill_data = json_decode($skill_data, true);
        $skill = array_column($skill_data, 'name');
        $skill = "'" . implode("','", $skill) . "'";

        return view('dashboard.skill.index', compact('skill'));
    }

    public function update(Request $request)
    {
        $request->validate([
            '_language' => 'required',
            '_workflow' => 'required'
        ], [
            '_language.required' => 'Masukkan Bahasa Pemrograman Yang Kamu Kuasai',
            '_workflow.required' => 'Masukkan Lingkup Kerja Yang Kamu Kuasai',
        ]);

        MetaData::updateOrCreate(['meta_key' => '_language'], ['meta_value' => $request->_language]);

        MetaData::updateOrCreate(['meta_key' => '_workflow'], ['meta_value' => $request->_workflow]);

        return redirect()->route('skill.index')->with('success', 'Berhasil Melakukan Update Skill');
    }
}
