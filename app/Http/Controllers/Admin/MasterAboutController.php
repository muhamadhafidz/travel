<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterAboutController extends Controller
{
    public function index()
    {
        $data = About::first();
        
        return view('admin.pages.about.index', [
            'data' => $data
        ]);
    
    }

    public function edit($id)
    {
        $data = About::findOrFail($id);
        return view('admin.pages.about.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'keterangan' => 'required',
            'deskripsi' => 'required',
        ]);
        $about = About::findOrFail($id);


        $about->judul = $data['judul'];
        $about->deskripsi = $data['deskripsi'];
        $about->keterangan = $data['keterangan'];
        $about->save();
        
        return redirect()->route('admin.about.index');
    }
}
