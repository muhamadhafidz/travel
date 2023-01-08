<?php

namespace App\Http\Controllers\Admin;

use App\Home_content;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Storage;

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
            'image' => '',
            'judul' => 'required',
            'deskripsi' => 'required',
        ]);
        $about = Home_content::findOrFail($id);
        $gambar = '';
        if (!empty($data['image'])) {
            $file = $data['image'];
            $file_name = $file->getFilename().".".strtolower($file->getClientOriginalExtension());
            
            $file_location = "assets/img/portfolio/";
            
            $gambar = $file_location.$file_name;

            Storage::disk('public')->putFileAs($file_location, $file, $file_name);
            
            $about->image = $gambar;
        }

        $about->judul = $data['judul'];
        $about->deskripsi = $data['deskripsi'];
        $about->save();
        
        return redirect()->route('admin.content.index');
    }
}
