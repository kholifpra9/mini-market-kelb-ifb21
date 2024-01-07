<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Cabang;
use App\Models\Transaksi;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->role == 'kasir'){
            return redirect()->route('kasir');
        }
        elseif (Auth::user()->role == 'pegawai gudang') {
            return redirect()->route('gudang');
        }
        else{
            $mostFrequentCabang = Transaksi::join('users', 'transaksis.user_id', '=', 'users.id')
                ->join('cabangs', 'users.cabang_id', '=', 'cabangs.id')
                ->select('cabangs.nama_cabang', DB::raw('COUNT(*) as total_transaksi'))
                ->groupBy('cabangs.nama_cabang')
                ->orderByDesc('total_transaksi')
                ->first();

            $data['cabangramai'] = $mostFrequentCabang->nama_cabang;
            $data['totalkaryawan']= User::whereNotNull('cabang_id')->count();
            $data['totpenjualan'] = Transaksi::sum('total_bayar');
            $data['totpembeli'] = Transaksi::count();
            return view('dashboard.index')->with($data);
        }
    }

    public function transaksiKasir(){
        return view('kasir.index');
    }

    public function gudangView(){
        return view('gudang.index');
    }

    public function kelolaBarang(){
        $data['cabangs'] = Cabang::all();
        $cabang_id = Auth::user()->cabang_id;
        $data['cabanguser'] = Cabang::where('id', $cabang_id)->first();
        $data['barangs'] = Barang::all();
        return view('dashboard.kelolaBarang', $data);
    }

    public function kelolaTransaksi(){
        $data['cabangs'] = Cabang::all();
        $cabang_id = Auth::user()->cabang_id;
        $data['cabanguser'] = Cabang::where('id', $cabang_id)->first();
        $data['transaksis'] = Transaksi::all();
        return view('dashboard.kelolaTransaksi', $data);
    }

    public function cetakTransaksi(string $cabId){
        $datas = Cabang::where('id', $cabId)->first();
        $data= Transaksi::whereHas('user', function ($query) use ($cabId) {
            $query->where('cabang_id', $cabId);
        })->get();

        $namacabang = Cabang::where('id', $cabId)->pluck('nama_cabang')->first();

        $namaFile = 'data transaksi di'.$cabId.'.pdf';

        $pdf = Pdf::loadview('dashboard.printtransaksi', ['transaksis' => $data, 'cabang' => $datas]);
    
        return $pdf->download($namaFile);
    }
    public function cetakBarang(string $cabId){
        $datas = Cabang::where('id', $cabId)->first();
        $data= Barang::whereHas('user', function ($query) use ($cabId) {
            $query->where('cabang_id', $cabId);
        })->get();

        $namacabang = Cabang::where('id', $cabId)->pluck('nama_cabang')->first();

        $namaFile = 'data barang di'.$cabId.'.pdf';

        $pdf = Pdf::loadview('dashboard.printbarang', ['barangs' => $data, 'cabang' => $datas]);
    
        return $pdf->download($namaFile);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
