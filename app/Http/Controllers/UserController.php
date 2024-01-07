<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\User;
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
