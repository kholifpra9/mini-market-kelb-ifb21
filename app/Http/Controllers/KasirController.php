<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function index()
    {
        return view('kasir.index');
    }

    public function storeTransaksi(Request $request){
        $validated = $request->validate([
            'user_id' => 'required',
            'total_bayar' => 'required',
            'tunai' => 'required',
            'kembalian' => 'required',
            'tanggal' => 'required',
        ]);
        
        $transaksi  = Transaksi::create($validated);

        $id = $transaksi->id;

        session(['transaksi_id' => $id]);
        
        if ($request->save == true) {
            return redirect()->route('kasir.detailTransaksi');
        }
    }

    public function detailTransaksi(){
        $data['barangs'] = Barang::all();
        $transaksi_id = session('transaksi_id');
        $data['details'] = DetailTransaksi::where('transaksi_id', $transaksi_id)->get();
        $data['transaksis'] = Transaksi::where('id', $transaksi_id)->first();
        return view('kasir.detailTransaksi', $data);
    }

    public function storeDetailTransaksi(Request $request){
        $validated = $request->validate([
            'transaksi_id' => 'required',
            'barang_id' => 'required',
            'qty' => 'required',
            'jumlah' => 'required',
        ]);

        $detailCreate = DetailTransaksi::create($validated);

        $detail_id = $detailCreate->id;
        $transaksi_id = $detailCreate->transaksi_id;
        $barang_id = $detailCreate->barang_id;
        $qty = $detailCreate->qty;
        $harga = Barang::where('id', $barang_id)->pluck('harga')->first();
        $jumlah = $qty * $harga;
        DetailTransaksi::where('id', $detail_id)->update(['jumlah' => $jumlah]);
        $total_harga = DetailTransaksi::where('transaksi_id', $transaksi_id)->sum('jumlah');
        Transaksi::where('id', $transaksi_id)->update(['total_bayar' => $total_harga]);
        $qty_barang = Barang::where('id', $barang_id)->pluck('qty')->first();
        $kurangi_qty = $qty_barang - $qty;
        Barang::where('id', $barang_id)->update(['qty' => $kurangi_qty]);

        if ($request->save == true) {
            return redirect()->route('kasir.detailTransaksi', [$total_harga, ]);
        }

    }

    public function bayarTransaksi(Request $request){
        $validated = $request->validate([
            'tunai' => 'required'
        ]);

        $transaksi_id = session('transaksi_id');
        $transaksi = Transaksi::where('id', $transaksi_id)->update(['tunai' => $validated['tunai']]);
        $transaksi_total = Transaksi::findOrFail($transaksi_id);
        $total_bayar = $transaksi_total->total_bayar;
        $tunai = $transaksi_total->tunai;
        $kembalian = $tunai - $total_bayar;
        Transaksi::where('id', $transaksi_id)->update(['kembalian' => $kembalian]);
        $data['transaksis'] = Transaksi::find($transaksi_id)->first();

        if ($request->save == true) {
            $bayar = 'false';
            session(['bayar' => $bayar]);
            return redirect()->route('kasir.detailTransaksi', $data);
        }

    }

}
