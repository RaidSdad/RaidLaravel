<!DOCTYPE html>
<html>
<head>
    <title>Data Kelas</title>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif

    <a href="{{ url ('/kelas/create')}}">Tambah Data</a>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-4">
    <h2 class="mb-4">Data Kelas</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Jurusan</th>
                <th>Lokasi Ruangan</th>
                <th>Nama Wali Kelas</th>
                <th colspan="2">Aksi</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse ($kelas as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->nama_kelas ?? '-' }}</td>
                    <td>{{ $item->jurusan ?? '-' }}</td>
                    <td>{{ $item->lokasi_ruangan ?? '-' }}</td>
                    <td>{{ $item->nama_wali_kelas ?? '-' }}</td>
                    <td><a href="{{ url('/kelas/edit/' . $item->id) }}">Edit</a></td>
        <td>
            <form action="{{ url('/kelas', $item->id )}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
</body>
</html>
