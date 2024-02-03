<!-- resources/views/paket/index_paket.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Paket</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('paket.create') }}" class="btn btn-primary mb-2">Tambah Paket</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pakets as $paket)
                    <tr>
                        <td>{{ $paket->id }}</td>
                        <td>{{ $paket->nama_paket }}</td>
                        <td>{{ $paket->harga }}</td>
                        <td>
                            <a href="{{ route('paket.edit', $paket->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('paket.destroy', $paket->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus paket ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tidak ada paket.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
