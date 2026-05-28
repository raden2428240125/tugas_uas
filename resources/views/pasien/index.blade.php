@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Data Pasien</h2>

    <a href="/pasien/create" class="btn btn-primary mb-3">

        Tambah Pasien

    </a>

    <table class="table table-bordered table-striped">

        <thead class="table-danger">

            <tr>

                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>No Telp</th>
                <th>Keluhan</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($pasiens as $pasien)
                <tr>

                    <td>{{ $pasien->idpasien }}</td>

                    <td>{{ $pasien->namapasien }}</td>

                    <td>{{ $pasien->notelp }}</td>

                    <td>{{ $pasien->keluhan }}</td>

                    <td>

                        <a href="/pasien/{{ $pasien->idpasien }}/edit" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="/pasien/{{ $pasien->idpasien }}" method="POST" class="d-inline">

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
