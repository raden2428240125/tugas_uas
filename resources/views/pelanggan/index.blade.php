@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Pelanggan</h2>

        <a href="/pelanggan/create" class="btn btn-primary">
            + Tambah Pelanggan
        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pelanggan as $index => $item)
                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $item->nama }}</td>

                            <td>{{ $item->email }}</td>

                            <td>{{ $item->no_telp }}</td>

                            <td>{{ $item->alamat }}</td>

                            <td>

                                <a href="/pelanggan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="/pelanggan/{{ $item->id }}" method="POST" style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center">

                                Belum ada data pelanggan

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
