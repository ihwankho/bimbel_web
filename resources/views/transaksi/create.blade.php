@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Transaksi</h1>
        <form method="POST" action="{{ route('transaksi.store') }}" enctype="multipart/form-data" class="form">
            @csrf
            @method("POST")
            <label for="customer_id">Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                @foreach ($customers as $id => $nama)
                    <option value="{{ $id }}">{{ $nama }}</option>
                @endforeach
            </select>
            <label for="tanggal_bayar">Tanggal Bayar</label>
            <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control" required>
            <label for="bukti_bayar">Bukti Bayar</label>
            <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control" accept="image/*" required>
            <label for="total_bayar">Total Bayar</label>
            <input type="number" name="total_bayar" id="total_bayar" class="form-control" required>
            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection
