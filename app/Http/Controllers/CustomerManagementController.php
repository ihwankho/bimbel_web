<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CustomerModel;

class CustomerManagementController extends Controller
{
    public function index()
    {
        $customers = CustomerModel::all();
        return view('client.index_customer', compact('customers'));
    }

    public function edit($id)
    {
        $customer = CustomerModel::findOrFail($id);

        // Ambil data paket dari tabel 'paket'
        $paketList = DB::table('paket')->pluck('nama_paket', 'harga');

        return view('client.edit_customer', compact('customer', 'paketList'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'required|numeric',
            'password' => 'required|string|min:8',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'paket' => 'required',
            'harga' => 'required|numeric',
        ]);

        $customer = CustomerModel::findOrFail($id);
        $customer->update($request->all());

        return redirect()->route('client.index')->with('success', 'Data client berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->delete();

        return redirect()->route('client.index')->with('success', 'Data client berhasil dihapus!');
    }

    public function getHarga($namaPaket)
    {
        // Lakukan logika untuk mendapatkan harga berdasarkan nama paket
        // Contoh: Ambil dari tabel paket
        $harga = \DB::table('paket')->where('nama_paket', $namaPaket)->value('harga');

        return response()->json($harga);
    }
}
