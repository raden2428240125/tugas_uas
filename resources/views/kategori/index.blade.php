@extends('layouts.main')

@section('content')

<h2 class="mb-4">Data Kategori</h2>

<a href="/kategori/create" class="btn btn-success mb-3">
    Tambah Kategori
</a>

<table class="table table-bordered">

    <thead>
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>

        @foreach($kategoris as $item)

        <tr>

            <td>{{ $loop->iteration }}</td>

            <td>{{ $item->nama_kategori }}</td>

            <td>

                <a href="/kategori/{{ $item->id }}/edit"
                   class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="/kategori/{{ $item->id }}"
                      method="POST"
                      class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin hapus kategori ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

        @endforeach

    </tbody>

</table>

@endsection