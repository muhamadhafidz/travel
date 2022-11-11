<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaction::with('user')->get();

        return view('admin.pages.transaksi.index', compact('data'));
    }

    public function batal($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan dibatalkan';
        $data->save();
        Alert::toast('Pesanan berhasil dibatalkan', 'success');
        return redirect()->route('admin.transaksi.index');
    }

    public function konfirmasi($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan dikonfirmasi';
        $data->save();
        Alert::toast('Pesanan berhasil dikonfirmasi', 'success');
        return redirect()->route('admin.transaksi.index');
    }

    public function kirim($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan dikirim';
        $data->save();
        Alert::toast('Pesanan berhasil dikirim', 'success');
        return redirect()->route('admin.transaksi.index');
    }

    public function selesai($id)
    {
        $data = Transaction::findOrFail($id);
        $data->status = 'pesanan selesai';
        $data->save();
        Alert::toast('Pesanan berhasil selesai', 'success');
        return redirect()->route('admin.transaksi.index');
    }
}
