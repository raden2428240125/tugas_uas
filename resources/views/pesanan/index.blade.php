@extends('layouts.main')

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

                            <td>

                                @if ($item->status == 'Selesai')
                                    <span class="badge bg-success">
                                        Selesai
                                    </span>
                                @elseif($item->status == 'Siap Diambil')
                                    <span class="badge bg-info">
                                        Siap Diambil
                                    </span>
                                @elseif($item->status == 'Diproses')
                                    <span class="badge bg-warning text-dark">
                                        Diproses
                                    </span>
                                @elseif($item->status == 'Dibatalkan')
                                    <span class="badge bg-danger">
                                        Dibatalkan
                                    </span>
                                @else
                                    <span class="badge bg-secondary">
                                        Menunggu Pembayaran
                                    </span>
                                @endif

                            </td>

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
