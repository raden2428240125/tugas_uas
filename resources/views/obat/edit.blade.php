<!DOCTYPE html>
<html>

<head>
    <title>Edit Obat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Edit Obat</h2>

        <form action="/obat/{{ $obat->idobat }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="namaobat" class="form-control" value="{{ $obat->namaobat }}">
            </div>

            <div class="mb-3">
                <label>Jenis Obat</label>
                <input type="text" name="jenisobat" class="form-control" value="{{ $obat->jenisobat }}">
            </div>

            <div class="mb-3">
                <label>Tanggal Kadaluarsa</label>
                <input type="date" name="tanggal_kadaluarsa" class="form-control"
                    value="{{ $obat->tanggal_kadaluarsa }}">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" value="{{ $obat->harga }}">
            </div>

            <div class="mb-3">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" value="{{ $obat->satuan }}">
            </div>

            <div class="mb-3">
                <label>Stok</label>
                <input type="number" name="stok" class="form-control" value="{{ $obat->stok }}">
            </div>

            <button type="submit" class="btn btn-success">
                Update
            </button>

        </form>

    </div>

</body>

</html>
