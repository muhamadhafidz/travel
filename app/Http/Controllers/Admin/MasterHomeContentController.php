<?php

namespace App\Http\Controllers\Admin;

use App\Home_content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterHomeContentController extends Controller
{
    public function index()
    {
        $data = Home_content::get();
        
        return view('admin.pages.content.index', [
            'data' => $data
        ]);
    
    }

    public function edit($id)
    {
        $data = Home_content::findOrFail($id);
        return view('admin.pages.content.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        $about = Home_content::findOrFail($id);


        $about->judul = $data['judul'];
        $about->deskripsi = $data['deskripsi'];
        $about->save();
        
        return redirect()->route('admin.content.index');
    }
}
