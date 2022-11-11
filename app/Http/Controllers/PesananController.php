<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function index()
    {
        $data = Transaction::get();
        return view('user.pages.pesanan.index', [
            'data' => $data
        ]);
    }

    public function selesai($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan selesai';
        $data->save();

        Alert::toast('Pesanan berhasil diselesaikan', 'success');
        return redirect()->route('user.pesanan');
    }

    public function batal($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan dibatalkan';
        $data->save();

        Alert::toast('Pesanan berhasil dibatalkan', 'success');
        return redirect()->route('user.pesanan');
    }

    public function uploadBukti($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'menunggu konfirmasi';
        $data->save();

        Alert::toast('Bukti berhasil diupload', 'success');
        return redirect()->route('user.pesanan');
    }
}
