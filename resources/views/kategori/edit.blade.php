<!DOCTYPE html>
<html>
<head>
    <title>Edit Kategori</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Edit Kategori</h2>

    <form action="/kategori/{{ $kategori->id }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label>Nama Kategori</label>

            <input
                type="text"
                name="nama_kategori"
                class="form-control"
                value="{{ $kategori->nama_kategori }}"
            >

        </div>

        <button type="submit" class="btn btn-success">
            Update
        </button>

        <a href="/kategori" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

</body>
</html>