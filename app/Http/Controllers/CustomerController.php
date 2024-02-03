<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function create()
    {
        // Mendapatkan daftar paket dari tabel 'paket'
        $paketList = DB::table('paket')->pluck('nama_paket', 'harga');

        return view('customer.create', compact('paketList'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama' => 'required|alpha',
                'email' => 'required|email|unique:customers,email',
                'nomor_telepon' => 'required|numeric',
                'password' => 'required|string|min:8',
                'alamat' => 'required',
                'tanggal_lahir' => 'required|date',
                'paket' => 'required',
                'harga' => 'required|numeric',
            ], [
                'nama.alpha' => 'Nama harus berupa huruf alfabet.',
                'nomor_telepon.numeric' => 'Nomor telepon harus berupa angka.',
            ]);
    
            // Lakukan operasi penyimpanan data di sini
           // Customer::create($request->all());
           Customer::create([
            'nama'=>$request->nama,
            'email'=>$request->email,
            'nomor_telepon'=>$request->nomor_telepon,
            'password'=>Hash::make($request->password),
            'alamat'=>$request->alamat,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'paket'=>$request->paket,
            'harga'=>$request->harga,
        ]);
            // Jika operasi berhasil, redirect dengan pesan sukses
            return redirect()->route('customer.create')->with('success', 'User berhasil diregistrasi!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Jika terjadi kesalahan validasi, redirect dengan pesan gagal
            return redirect()->route('customer.create')->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Jika terjadi kesalahan lain, redirect dengan pesan gagal
            return redirect()->route('customer.create')->with('error', 'Gagal menambahkan data. Silakan coba lagi.');
        }
    }
}    
