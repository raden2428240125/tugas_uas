@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Data Dokter</h2>

    <a href="/dokter/create" class="btn btn-primary mb-3">
        Tambah Dokter
    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-danger">

            <tr>

                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>Spesialis</th>
                <th>Jadwal Praktik</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($dokters as $dokter)
                <tr>

                    <td>{{ $dokter->iddokter }}</td>
                    <td>{{ $dokter->namadokter }}</td>
                    <td>{{ $dokter->spesialis }}</td>
                    <td>{{ $dokter->jadwalpraktik }}</td>

                    <td>

                        <a href="/dokter/{{ $dokter->iddokter }}/edit" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="/dokter/{{ $dokter->iddokter }}" method="POST" class="d-inline">

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
