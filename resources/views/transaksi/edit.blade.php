<!-- resources/views/transaksi/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Edit Transaksi</h2>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="customer_id">Nama Customer:</label>
        <select name="customer_id" id="customer_id">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}" @if($transaksi->customer_id == $customer->id) selected @endif>{{ $customer->nama }}</option>
            @endforeach
        </select>
        <br>

        <label for="tanggal_bayar">Tanggal Bayar:</label>
        <input type="date" name="tanggal_bayar" id="tanggal_bayar" value="{{ $transaksi->tanggal_bayar }}" required>
        <br>

        <label for="total_bayar">Total Bayar:</label>
        <input type="number" name="total_bayar" id="total_bayar" value="{{ $transaksi->total_bayar }}" required>
        <br>

        <label for="bukti_bayar">Bukti Bayar:</label>
        <input type="file" name="bukti_bayar" id="bukti_bayar" accept="image/*">
        <br>

        @if($transaksi->bukti_bayar)
            <p><strong>Bukti Bayar Saat Ini:</strong></p>
            <img src="{{ asset('storage/bukti_bayar/' . $transaksi->bukti_bayar) }}" alt="Bukti Bayar">
        @endif

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
