<?php

namespace App\Http\Controllers;

use App\About;
use App\Gallery;
use App\Home_content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        $about = About::first();
        $galleries = Gallery::get();
        $content_snork = Home_content::where('tipe', 'snorkling')->first();
        $content_camp = Home_content::where('tipe', 'camping')->first();
        return view('user.pages.home.index', [
            'about' => $about,
            'galleries' => $galleries,
            'content_snork' => $content_snork,
            'content_camp' => $content_camp,
        ]);
    }
}
