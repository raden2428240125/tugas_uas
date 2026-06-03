@extends('layouts.main')

@section('content')
    <h2 class="mb-4">
        Data Detail Pesanan
    </h2>

    <a href="{{ route('detail-pesanan.create') }}" class="btn btn-primary mb-3">

        Tambah Detail Pesanan

    </a>

    <table class="table table-bordered">

        <thead class="table-danger">

            <tr>

                <th>ID</th>
                <th>Pesanan</th>
                <th>Obat</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($detailPesanans as $detail)
                <tr>

                    <td>{{ $detail->id }}</td>

                    <td>
                        Pesanan #{{ $detail->pesanan->id }}
                    </td>

                    <td>
                        {{ $detail->obat->nama_obat }}
                    </td>

                    <td>
                        {{ $detail->jumlah }}
                    </td>

                    <td>
                        Rp {{ number_format($detail->subtotal, 0, ',', '.') }}
                    </td>

                    <td>

                        <a href="{{ route('detail-pesanan.edit', $detail->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('detail-pesanan.destroy', $detail->id) }}" method="POST" class="d-inline">

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
