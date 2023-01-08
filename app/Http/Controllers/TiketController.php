<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TiketController extends Controller
{
    public function index()
    {
        return view('user.pages.tiket.index');
    }


    public function cekHarga(Request $request)
    {
        $data = $request->validate([
            'mulai' => 'date|required',
            'selesai' => 'date|required',
            'total_orang' => 'required|integer',
            'alamat_kirim' => 'required|string'
        ]);
        
        if ($request->mulai <= Carbon::now()) {
            Alert::toast('tanggal minimal pemesanan tiket adalah H+1 pemesanan!', 'error');
            return redirect()->route('user.tiket');
        }

        if ($request->mulai >= $request->selesai) {
            Alert::toast('pemesanan minimal 2 hari!', 'error');
            return redirect()->route('user.tiket');
        }
        $to = Carbon::parse($request->mulai);
        $from = Carbon::parse($request->selesai);
        $waktu = $to->diffInDays($from);

        $tiket = Ticket::first();

        $harga = $tiket->harga * $request->total_orang * $waktu;

        Alert::toast('perhitungan berhasil dilakukan!', 'success');
        return redirect()->route('user.tiket')->with([
            'sukses_hitung' => 'sukses',
            'mulai' => $data['mulai'],
            'selesai' => $data['selesai'],
            'total_orang' => $data['total_orang'],
            'alamat_kirim' => $data['alamat_kirim'],
            'harga' => $harga
        ]);
    }

    public function pesanTiket(Request $request)
    {
        $data = $request->validate([
            'mulai' => 'date|required',
            'selesai' => 'date|required',
            'total_orang' => 'required|integer',
            'alamat_kirim' => 'required|string'
        ]);
        
        
        $to = Carbon::parse($request->mulai);
        $from = Carbon::parse($request->selesai);
        $waktu = $to->diffInDays($from);

        $ticket = Ticket::first();

        $harga_book = $ticket->harga * $waktu;

        $harga = $harga_book * $request->total_orang;

        $tran = Transaction::create([
            'user_id' => Auth::user()->id,
            'ticket_id' => $ticket->id,
            'harga_tiket' => $ticket->harga,
            'mulai' => $request->mulai,
            'selesai' => $request->selesai,
            'harga_booking' => $harga_book,
            'total_orang' => $request->total_orang,
            'total_harga' => $harga,
            'alamat_kirim' => $request->alamat_kirim,
            'status' => 'menunggu pembayaran',
            'invoice' => '-'
        ]);

        $invoice = 'INV-'.date('Ymd').$tran->id.rand(100, 999);

        $tran->invoice = $invoice;
        $tran->save();
        
        Alert::toast('pemesanan tiket berhasil dilakukan!', 'success');
        return redirect()->route('user.pesanan');
    }
}
