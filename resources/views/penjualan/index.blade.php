@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Data Penjualan</h2>

    <a href="/penjualan/create" class="btn btn-primary mb-3">
        Tambah Penjualan
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-danger">

            <tr>

                <th>ID Penjualan</th>
                <th>ID Resep</th>
                <th>ID Kasir</th>
                <th>ID Apoteker</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($penjualans as $penjualan)
                <tr>

                    <td>{{ $penjualan->idpenjualan }}</td>
                    <td>{{ $penjualan->idresep }}</td>
                    <td>{{ $penjualan->idkasir }}</td>
                    <td>{{ $penjualan->idapoteker }}</td>
                    <td>{{ $penjualan->tanggal }}</td>
                    <td>Rp {{ number_format($penjualan->totalharga) }}</td>

                    <td>

                        <a href="/penjualan/{{ $penjualan->idpenjualan }}/edit" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/penjualan/{{ $penjualan->idpenjualan }}" method="POST" class="d-inline">

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
@endsection
