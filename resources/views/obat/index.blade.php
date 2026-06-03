@extends('layouts.main')

@section('content')
    <h2 class="mb-4">Data Obat</h2>

    <a href="/obat/create" class="btn btn-primary mb-3">
        Tambah Obat
    </a>

    <input type="text" id="searchInput" class="form-control mb-3" placeholder="Cari nama obat...">

    <table class="table table-bordered table-striped">

        <thead class="table-danger">

            <tr>

                <th>ID</th>
                <th>Nama Obat</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Stok</th>
                <th>Kadaluarsa</th>
                <th>Deskripsi</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($obats as $obat)
                <tr>

                    <td>{{ $obat->id }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->jenis_obat }}</td>
                    <td>{{ $obat->kategori->nama_kategori }}</td>
                    <td>Rp {{ number_format($obat->harga, 0, ',', '.') }}</td>
                    <td>{{ $obat->satuan }}</td>
                    <td>{{ $obat->stok }}</td>
                    <td>{{ $obat->tanggal_kadaluarsa }}</td>
                    <td>{{ $obat->deskripsi }}</td>

                    <td>

                        <a href="/obat/{{ $obat->id }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/obat/{{ $obat->id }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>

    <script>
        document
            .getElementById('searchInput')
            .addEventListener('keyup', function() {

                let value =
                    this.value.toLowerCase();

                let rows =
                    document.querySelectorAll('tbody tr');

                rows.forEach(function(row) {

                    row.style.display =
                        row.innerText
                        .toLowerCase()
                        .includes(value)

                        ?
                        ''

                        :
                        'none';

                });

            });
    </script>
@endsection
