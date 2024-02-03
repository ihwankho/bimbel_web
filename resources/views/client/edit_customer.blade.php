<!-- resources/views/client/edit_customer.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Customer</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('client.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama', $customer->nama) }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_telepon">Nomor Telepon:</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon', $customer->nomor_telepon) }}" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" class="form-control" value="{{ old('password', $customer->password) }}" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat', $customer->alamat) }}" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" name="tanggal_lahir" class="form-control" value="{{ old('tanggal_lahir', $customer->tanggal_lahir) }}" required>
            </div>
            <div class="form-group">
    <label for="paket">Paket:</label>
    <select class="form-control" id="paket" name="paket" onchange="updateHarga()" required>
        <option value="" disabled selected>Pilih Paket</option>
        @foreach($paketList as $harga => $nama_paket)
            <option value="{{ $harga }}">{{ $nama_paket }}</option>
        @endforeach
    </select>
</div>

                    <div class="form-group">
                        <label for="harga">Harga:</label>
                        <input type="text" class="form-control" id="harga" name="harga" readonly required>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>

            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function updateHarga() {
            var paketSelect = document.getElementById('paket');
            var hargaInput = document.getElementById('harga');
            hargaInput.value = paketSelect.value;
        }
    </script>
    <script>
    function updateHarga() {
        var paketSelect = document.getElementById('paket');
        var hargaInput = document.getElementById('harga');
        hargaInput.value = paketSelect.value;
    }
    </script>

@endsection
