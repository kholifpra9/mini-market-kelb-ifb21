<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirController extends Controller
{
    public function index()
    {
        $user_id = Auth::user()->id;
        $cabang_id = Auth::user()->cabang_id;
        $data['barangs'] = Barang::whereHas('user', function ($query) use ($cabang_id) {
            $query->where('cabang_id', $cabang_id);
        })->get();

        $transaksi_id = session('transaksi_id');
        $data['details'] = DetailTransaksi::where('transaksi_id', $transaksi_id)->get();
        $data['transaksis'] = Transaksi::where('id', $transaksi_id)->first();
        return view('kasir.index', $data);
        // $data['barangs'] = Barang::all();
        // $transaksi_id = session('transaksi_id');
        // $data['details'] = DetailTransaksi::where('transaksi_id', $transaksi_id)->get();
        // $data['transaksis'] = Transaksi::where('id', $transaksi_id)->first();
        // return view('kasir.index', $data);
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
            $bayar = '2';
            session(['bayar' => $bayar]);
            return redirect()->route('kasir');
        }
    }

    public function detailTransaksi(){
        $data['barangs'] = Barang::all();
        $transaksi_id = session('transaksi_id');
        $data['details'] = DetailTransaksi::where('transaksi_id', $transaksi_id)->get();
        $data['transaksis'] = Transaksi::where('id', $transaksi_id)->first();
        return view('kasir', $data);
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
            return redirect()->route('kasir', [$total_harga, ]);
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

        $bayar = '1';
        session(['bayar' => $bayar]);
        if ($request->save == true) {
            
            return redirect()->route('kasir', $data);
        }

    }

    public function cetak(){
        $transaksi_id = session('transaksi_id');
        $data = DetailTransaksi::where('transaksi_id', $transaksi_id)->with('transaksi.user')->first();
        $datas = DetailTransaksi::where('transaksi_id', $transaksi_id)->with('barang')->get();

        $namaFile = 'Struk_'.$transaksi_id.'.pdf';

        $pdf = FacadePdf::loadview('kasir.cetak', ['detailTransaksi' => $data], ['dtbarangs' => $datas]);
    
        return $pdf->download($namaFile);

        // return redirect()->route('kasir');
    }

    public function selesai(Request $request){
        if ($request->selesai == true) {
            $request->session()->forget(['transaksi_id', 'bayar']);
            return redirect()->route('kasir');
        }
    }

    public function destroyPilihan(string $id){
        $detail_id = $id;
        $transaksi_id = session('transaksi_id');

        $qtytransaksi = DetailTransaksi::where('id', $detail_id)->pluck('qty')->first();
        $barang_id = DetailTransaksi::where('id', $detail_id)->pluck('barang_id')->first();
        $barang_qty = Barang::where('id', $barang_id)->pluck('qty')->first();
        $tambahqty = $barang_qty + $qtytransaksi;
        Barang::where('id', $barang_id)->update(['qty' => $tambahqty]);

        $jumlah = DetailTransaksi::where('id', $detail_id)->pluck('jumlah')->first();
        $total_bayar = Transaksi::where('id', $transaksi_id)->pluck('total_bayar')->first();
        $total = $total_bayar - $jumlah;
        Transaksi::where('id', $transaksi_id)->update(['total_bayar' => $total]);

        $detail = DetailTransaksi::findOrFail($id);

        $detail->delete();

        $notification = array(
            'message' => 'Data Buku berhasil dihapus',
            'alerty-type' => 'succes'
        );

        return redirect()->route('kasir')->with($notification);
    }
}