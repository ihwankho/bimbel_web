<?php

// app/Http/Controllers/TransaksiController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Customer;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $customers = Customer::pluck('nama', 'id');
        return view('transaksi.create', compact('customers'));
    }

    public function edit($id)
{
    $transaksi = Transaksi::findOrFail($id);
    $customers = Customer::pluck('nama', 'id');
    return view('transaksi.edit', compact('transaksi', 'customers'));
}

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'tanggal_bayar' => 'required|date',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'total_bayar' => 'required|numeric',
        ]);

        $no_invoice = rand(100000, 999999);

        $transaksi = new Transaksi([
            'customer_id' => $request->get('customer_id'),
            'no_invoice' => $no_invoice,
            'tanggal_bayar' => $request->get('tanggal_bayar'),
            'total_bayar' => $request->get('total_bayar'),
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $file = $request->file('bukti_bayar');
            $fileName = time() . '_' . $file->getClientOriginalName();
           $file->move(public_path('/bukti_bayar'), $fileName);
            $transaksi->bukti_bayar = $fileName;
        }

        $transaksi->save();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function destroy(String $id){
        $transaksi = Transaksi::find($id);

        if($transaksi->bukti_bayar){
            unlink(public_path('bukti_bayar/'. $transaksi->bukti_bayar));
        }
        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');

    }
    // ...
}
