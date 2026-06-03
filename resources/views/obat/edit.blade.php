<!DOCTYPE html>
<html>

<head>
    <title>Edit Obat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <h2>Edit Obat</h2>

        <form action="{{ route('obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Obat</label>
                <input type="text" name="nama_obat" class="form-control" value="{{ $obat->nama_obat }}">
            </div>

            <div class="mb-3">
                <label>Jenis Obat</label>
                <input type="text" name="jenis_obat" class="form-control" value="{{ $obat->jenis_obat }}">
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

            <div class="mb-3">
                <label>Kategori</label>
                <select name="kategori_id" class="form-control">
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ $obat->kategori_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control">{{ $obat->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">
                Update
            </button>

        </form>

    </div>

</body>

</html>
