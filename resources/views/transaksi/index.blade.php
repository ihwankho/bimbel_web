@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Transaksi</h1>
        <a href="/transaksi/create">Tambah Transaksi</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Customer</th>
                    <th>No Invoice</th>
                    <th>Tanggal Bayar</th>
                    <th>Bukti Bayar</th>
                    <th>Total Bayar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksis as $item)
                <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->no_invoice }}</td>
                        <td>{{ $item->tanggal_bayar }}</td>
                        <td>
                            @if ($item->bukti_bayar)
                                <a href="#" onclick="showImage('{{ asset(',storage/bukti_bayar/' . $item->bukti_bayar) }}')">
                                    <img width="120" src="{{ asset('/bukti_bayar/' . $item->bukti_bayar) }}" alt="Bukti Bayar">
                                </a>
                            @else
                                Belum ada bukti bayar
                            @endif
                        </td>
                        <td>{{ $item->total_bayar }}</td>
                        <td>
                            <a href="#" onclick="printInvoice('{{ $item->id }}')" class="btn btn-info">Print</a>
                            <form action="/transaksi/{{$item->id}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
</form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal for Image Popup -->
    <div id="imageModal" class="modal">
        <span class="close" onclick="closeImageModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <script>
        function showImage(imageUrl) {
            var modal = document.getElementById('imageModal');
            var modalImage = document.getElementById('modalImage');

            modal.style.display = 'block';
            modalImage.src = imageUrl;
        }

        function closeImageModal() {
            var modal = document.getElementById('imageModal');
            modal.style.display = 'none';
        }

        function printInvoice(transactionId) {
            // Gantilah URL berikut dengan URL sesuai dengan endpoint cetak di aplikasi Anda
            var printUrl = '/cetak/' + transactionId;
            window.location.href = printUrl;
        }

        function deleteTransaction(transactionId) {
            if (confirm('Apakah Anda yakin ingin menghapus transaksi ini?')) {
                // Gantilah URL berikut dengan URL sesuai dengan endpoint penghapusan di aplikasi Anda
                var deleteUrl = '/transaksi/' + transactionId;
                
                // Buat formulir penghapusan dan kirimkan melalui metode DELETE
                var form = document.createElement('form');
                form.method = 'POST';
                form.action = deleteUrl;
                form.style.display = 'none';

                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                var csrfInput = document.createElement('input');
                csrfInput.name = '_token';
                csrfInput.value = csrfToken;
                form.appendChild(csrfInput);

                var methodInput = document.createElement('input');
                methodInput.name = '_method';
                methodInput.value = 'DELETE';
                form.appendChild(methodInput);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
