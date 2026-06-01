@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Pesanan</h2>

        <a href="/pesanan/create" class="btn btn-primary">

            + Tambah Pesanan

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Pelanggan</th>
                        <th>Resep</th>
                        <th>Tanggal</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pesanan as $index => $item)
                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>{{ $item->pelanggan->nama }}</td>

                            <td>

                                {{ $item->resep ? $item->resep->file_resep : '-' }}

                            </td>

                            <td>{{ $item->tanggal_pesanan }}</td>

                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>

                            <td>{{ $item->status }}</td>

                            <td>

                                <a href="/pesanan/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="/pesanan/{{ $item->id }}" method="POST" style="display:inline;">

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

                            <td colspan="7" class="text-center">

                                Belum ada data pesanan

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
