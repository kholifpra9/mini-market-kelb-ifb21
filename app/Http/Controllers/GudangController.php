<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barangs'] = Barang::with('user')->get();
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
