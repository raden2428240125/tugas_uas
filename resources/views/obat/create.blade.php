<!DOCTYPE html>
<html>

<head>
    <title>Tambah Obat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Tambah Obat</h2>

        <form action="{{ route('obat.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>ID Obat</label>
                <input type="text" name="idobat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="namaobat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Obat</label>
                <input type="text" name="jenisobat" class="form-control">
            </div>

            <div class="mb-3">
                <label>Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" class="form-control">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control">
            </div>

            <div class="mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control">
            </div>

            <button type="submit" class="btn btn-success">
                Simpan
            </button>

        </form>

    </div>

</body>

</html>
