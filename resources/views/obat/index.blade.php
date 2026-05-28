@extends('layouts.app')

@section('content')

<h2 class="mb-4">Data Obat</h2>

<a href="/obat/create" class="btn btn-primary mb-3">
    Tambah Obat
</a>

<table class="table table-bordered table-striped">

    <thead class="table-danger">
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Harga</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @foreach($obats as $obat)

        <tr>

            <td>{{ $obat->idobat }}</td>
            <td>{{ $obat->namaobat }}</td>
            <td>{{ $obat->jenisobat }}</td>
            <td>{{ $obat->tanggal_kadaluarsa }}</td>
            <td>{{ $obat->harga }}</td>
            <td>{{ $obat->satuan }}</td>
            <td>{{ $obat->stok }}</td>

            <td>

                <a href="/obat/{{ $obat->idobat }}/edit"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="/obat/{{ $obat->idobat }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                        class="btn btn-danger btn-sm">
                        Hapus
                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection