@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Data Pembayaran</h2>

        <a href="/pembayaran/create" class="btn btn-primary">

            + Tambah Pembayaran

        </a>

    </div>

    <div class="card shadow-sm">

        <div class="card-body">

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>ID Pesanan</th>
                        <th>Metode</th>
                        <th>Jumlah Bayar</th>
                        <th>Status</th>
                        <th>Tanggal Bayar</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pembayaran as $index => $item)
                        <tr>

                            <td>{{ $index + 1 }}</td>

                            <td>
                                #{{ $item->pesanan_id }}
                            </td>

                            <td>
                                {{ $item->metode_pembayaran }}
                            </td>

                            <td>
                                Rp {{ number_format($item->jumlah_bayar, 0, ',', '.') }}
                            </td>

                            <td>

                                @if ($item->status_pembayaran == 'Lunas')
                                    <span class="badge bg-success">
                                        Lunas
                                    </span>
                                @elseif($item->status_pembayaran == 'Menunggu Verifikasi')
                                    <span class="badge bg-warning text-dark">
                                        Menunggu Verifikasi
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Belum Dibayar
                                    </span>
                                @endif

                            </td>

                            <td>
                                {{ $item->tanggal_pembayaran }}
                            </td>

                            <td>

                                <a href="/pembayaran/{{ $item->id }}/edit" class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="/pembayaran/{{ $item->id }}" method="POST" style="display:inline;">

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

                                Belum ada data pembayaran

                            </td>

                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
