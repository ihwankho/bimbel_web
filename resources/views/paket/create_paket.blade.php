<!-- resources/views/paket/create_paket.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Paket Baru</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paket.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_paket">Nama Paket:</label>
                <input type="text" name="nama_paket" class="form-control" value="{{ old('nama_paket') }}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga:</label>
                <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
