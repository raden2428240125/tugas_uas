@extends('layouts.app')

@section('content')
    <h2 class="mb-4">
        Edit Detail Pesanan
    </h2>

    <form action="{{ route('detail-pesanan.update', $detailPesanan->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Pesanan</label>

            <select name="pesanan_id" class="form-control">

                @foreach ($pesanans as $pesanan)
                    <option value="{{ $pesanan->id }}" {{ $detailPesanan->pesanan_id == $pesanan->id ? 'selected' : '' }}>

                        Pesanan #{{ $pesanan->id }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Obat</label>

            <select name="obat_id" class="form-control">

                @foreach ($obats as $obat)
                    <option value="{{ $obat->id }}" {{ $detailPesanan->obat_id == $obat->id ? 'selected' : '' }}>

                        {{ $obat->nama_obat }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label>Jumlah</label>

            <input type="number" name="jumlah" value="{{ $detailPesanan->jumlah }}" class="form-control">

        </div>

        <button type="submit" class="btn btn-success">

            Update

        </button>

    </form>
@endsection
