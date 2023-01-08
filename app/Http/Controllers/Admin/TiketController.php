<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ticket;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TiketController extends Controller
{
    public function index()
    {
        $data = Ticket::first();
        return view('admin.pages.ticket.index', compact('data'));
    }

    public function simpan(Request $request)
    {
        $data = $request->validate([
            'harga' => 'required'
        ]);


        $item = Ticket::first();

        $item->harga = $data['harga'];
        $item->save();

        Alert::toast('Harga berhasil disimpan', 'success');
        
        return redirect()->route('admin.ticket.index');
    }
}
