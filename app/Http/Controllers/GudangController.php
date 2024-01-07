<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $cabang_id = Auth::user()->cabang_id;
        $data['barangs'] = Barang::whereHas('user', function ($query) use ($cabang_id) {
            $query->where('cabang_id', $cabang_id);
        })->get();
        return view('gudang.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gudang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode' => 'required',
            'nama_barang' => 'required|max:60',
            'jenis' => 'required|max:60',
            'harga' => 'required',
            'qty' => 'required',
            'expired' => 'required',
            'user_id' => 'required',
        ]);

        Barang::create($validated);

        $notification = array(
            'message' => 'Data barang berhasil ditambahkan',
            'alerty-type' => 'succes'
        );

        if ($request->save == true) {
            return redirect()->route('gudang')->with($notification);
        }
        else{
            return redirect()->route('barang.create')->with($notification);
        }
    }

    public function edit(string $id){
        $data['barang'] = Barang::findOrFail($id);

        return view('gudang.edit')->with($data);
    }

    public function update(Request $request, string $id){
        $barang = Barang::findOrFail($id);

        $validated = $request->validate([
            'kode' => 'required',
            'nama_barang' => 'required|max:60',
            'jenis' => 'required|max:60',
            'harga' => 'required',
            'qty' => 'required',
            'expired' => 'required',
        ]);


        Barang::where('id', $id)->update([
            'kode' => $validated['kode'],
            'nama_barang' => $validated['nama_barang'],
            'jenis' => $validated['jenis'],
            'harga' => $validated['harga'],
            'qty' => $validated['qty'],
            'expired' => $validated['expired'],
        ]);

        $notification = array(
            'message' => 'Data Buku berhasil diperbaharui',
            'alerty-type' => 'succes'
        );

        return redirect()->route('gudang')->with($notification);
    }

    public function destroy(string $id){
        $barang = Barang::findOrFail($id);

        $barang->delete();

        $notification = array(
            'message' => 'Data Buku berhasil dihapus',
            'alerty-type' => 'succes'
        );

        return redirect()->route('gudang')->with($notification);
    }
}
