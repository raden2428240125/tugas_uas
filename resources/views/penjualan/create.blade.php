@extends ('layouts.app')

@section('content')
    <h2 class="mb-4">Tambah Penjualan</h2>

    <form action="{{ route('penjualan.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>ID Penjualan</label>

            <input type="text" name="idpenjualan" class="form-control">

        </div>

        <div class="mb-3">

            <label>Nama Obat</label>

            <input type="text" name="namaobat" class="form-control">

        </div>

        <div class="mb-3">

            <label>Jumlah</label>

            <input type="number" name="jumlah" class="form-control">

        </div>

        <div class="mb-3">

            <label>Harga</label>

            <input type="number" name="harga" class="form-control">

        </div>

        <button type="submit" class="btn btn-success">

            Simpan

        </button>

    </form>
@endsection