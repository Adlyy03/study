<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Inventory::all();
        return view('inventories.index', compact('inventories'));
    }

    public function create()
    {
        return view('inventories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:inventories',
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi_barang' => 'required',
        ]);

        Inventory::create($request->all());
        return redirect()->route('inventories.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function edit(Inventory $inventory)
    {
        return view('inventories.edit', compact('inventory'));
    }

    public function update(Request $request, Inventory $inventory)
    {
        $request->validate([
            'nama_barang' => 'required',
            'kategori' => 'required',
            'lokasi_barang' => 'required',
        ]);

        $inventory->update($request->all());
        return redirect()->route('inventories.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('inventories.index')->with('success', 'Data barang berhasil dihapus');
    }
}
