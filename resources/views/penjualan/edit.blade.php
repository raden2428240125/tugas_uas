@extends ('layouts.app')

@section('content')
    <h2 class="mb-4">Edit Penjualan</h2>

    <form action='/penjualan/{{ $penjualan->idpenjualan }}' method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>ID Penjualan</label>

            <input type="text" name="idpenjualan" class="form-control" value="{{ $penjualan->idpenjualan }}">

        </div>

        <div class="mb-3">

            <label>Nama Obat</label>

            <input type="text" name="namaobat" class="form-control" value="{{ $penjualan->namaobat }}">

        </div>

        <div class="mb-3">

            <label>Jumlah</label>

            <input type="number" name="jumlah" class="form-control" value="{{ $penjualan->jumlah }}">

        </div>

        <div class="mb-3">

            <label>Harga</label>

            <input type="number" name="harga" class="form-control" value="{{ $penjualan->harga }}">

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection