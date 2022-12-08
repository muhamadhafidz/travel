<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Transaction_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function index()
    {
        $data = Transaction::where('user_id', Auth::user()->id)->get();
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

    public function uploadBukti(Request $request, $id)
    {
        $image = $request->validate([
            'image' => 'required',
        ]);
        $data = Transaction::findOrFail($id);

        if ($image['image']) {
            $file = $image['image'];
            $file_name = $file->getFilename().".".strtolower($file->getClientOriginalExtension());
            
            $file_location = "assets/img/bukti/";
            
            $image['image'] = $file_location.$file_name;

            Storage::disk('public')->putFileAs($file_location, $file, $file_name);

            Transaction_payment::create([
                'transaction_id' => $data->id,
                'bukti_bayar' => $image['image'],
                'status' => 'menunggu konfirmasi'
            ]);
        }
        
        $data->status = 'menunggu konfirmasi';
        $data->save();

        Alert::toast('Bukti berhasil diupload', 'success');
        return redirect()->route('user.pesanan');
    }
}
