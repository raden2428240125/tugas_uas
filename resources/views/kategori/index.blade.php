<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h2 class="mb-4">Data Kategori</h2>

    <a href="/kategori/create" class="btn btn-success mb-3">
        Tambah Kategori
    </a>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
        </tr>

        @foreach($kategoris as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_kategori }}</td>
            <td>
                <a href="/kategori/{{ $item->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/kategori/{{ $item->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

</div>

</body>
</html>