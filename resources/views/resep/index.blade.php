@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Resep</h2>

        <a href="/resep/create" class="btn btn-primary">

            + Tambah Resep

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>File Resep</th>
                        <th>Status</th>
                        <th>Catatan</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($resep as $index => $item)
                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $item->pelanggan->nama }}</td>

                            <td>{{ $item->file_resep }}</td>

                            <td>{{ $item->status }}</td>

                            <td>{{ $item->catatan }}</td>

                            <td>

                                <a href="/resep/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="/resep/{{ $item->id }}" method="POST" style="display:inline;">

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

                                Belum ada data resep

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
