<!-- resources/views/client/index_customer.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Daftar Customer</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nomor Telepon</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->nama }}</td>
                        <td>{{ $customer->nomor_telepon }}</td>
                        <td>{{ $customer->alamat }}</td>
                        <td>{{ $customer->tanggal_lahir }}</td>
                        <td>
                            <a href="{{ route('client.edit', $customer->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('client.destroy', $customer->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data client ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Tidak ada data client.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
