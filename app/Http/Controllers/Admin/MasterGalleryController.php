<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MasterGalleryController extends Controller
{
    public function index()
    {
        $data = Gallery::get();
        
        return view('admin.pages.gallery.index', [
            'data' => $data
        ]);
    
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function edit($id)
    {
        $data = Gallery::findOrFail($id);
        return view('admin.pages.gallery.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'image' => 'required',
        ]);
        $file = $data['image'];
        $file_name = $file->getFilename().".".strtolower($file->getClientOriginalExtension());
        
        $file_location = "assets/img/portfolio/";
        
        $gambar = $file_location.$file_name;

        Storage::disk('public')->putFileAs($file_location, $file, $file_name);

        Gallery::create([
            'judul' => $data['judul'],
            'kategori' => $data['kategori'],
            'image' => $gambar,
        ]);
        return redirect()->route('admin.gallery.index');
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'image' => '',
        ]);
        $gallery = Gallery::findOrFail($id);

        if ($data['image']) {
            $file = $data['image'];
            $file_name = $file->getFilename().".".strtolower($file->getClientOriginalExtension());
            
            $file_location = "assets/img/portfolio/";
            
            $data['image'] = $file_location.$file_name;

            Storage::disk('public')->putFileAs($file_location, $file, $file_name);

            if (Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }
            $gallery->image = $data['image'];
        }

        $gallery->judul = $data['judul'];
        $gallery->kategori = $data['kategori'];
        $gallery->save();
        
        return redirect()->route('admin.gallery.index');
    }
}
