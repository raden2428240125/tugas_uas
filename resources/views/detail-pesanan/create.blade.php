@extends('layouts.app')

@section('content')
    <h2 class="mb-4">
        Tambah Detail Pesanan
    </h2>

    <form action="{{ route('detail-pesanan.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Pesanan</label>

            <select name="pesanan_id" class="form-control">

                @foreach ($pesanans as $pesanan)
                    <option value="{{ $pesanan->id }}">

                        Pesanan #{{ $pesanan->id }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Obat</label>

            <select name="obat_id" class="form-control">

                @foreach ($obats as $obat)
                    <option value="{{ $obat->id }}">

                        {{ $obat->nama_obat }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Jumlah</label>

            <input type="number" name="jumlah" class="form-control">

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection
