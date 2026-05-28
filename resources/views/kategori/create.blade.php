<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2>Tambah Kategori</h2>

    <form action="/kategori" method="POST">
        @csrf

        <div class="mb-3">
            <label>Nama Kategori</label>

            <input type="text"
                   name="nama_kategori"
                   class="form-control">
        </div>

        <button class="btn btn-primary">
            Simpan
        </button>

    </form>

</div>

</body>
</html>