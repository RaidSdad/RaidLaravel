Belajar Laravel, Tulisan ini ditampilkan dari view<br>
<!-- <table border="1">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Golongan Darah</th>
        </tr>
        @foreach ($siswa as $i => $row)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->nama_lengkap }}</td>
            <td>{{ $row->jenis_kelamin }}</td>
            <td>{{ $row->goldar }}</td>
        </tr>
        @endforeach
    </table> -->

    @session('succes')
        <div class="alert alert-succes">
            {{session('succes')}}
        </div>
    @endsession

    
    @session('error')
        <div class="alert alert-error">
            {{session('error')}}
        </div>
    @endsession

    <a href="{{ url ('/kelas/create')}}">Tambah Data</a>
    <table border="1">
    <tr>
        <td>No</td>
        <td>Nama Kelas</td>
        <td>Jurusan</td>
        <td colspan="2">Aksi</td>

    </tr>
    @foreach ($siswa as $i => $row)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $row->nama_kelas }}</td>
        <td>{{ $row->jurusan }}</td>
        <td>{{ $row->wali_kelas }}</td>
        <td><a href="{{ url('/kelas/edit/' . $row->id) }}">Edit</a></td>
        <td>
            <form action="{{ url('/kelas', $row->id )}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
        
    </tr>
@endforeach

</table>

// <!-- Halo saya {{$nama}}, Jenis Kelamin saya {{$jk}} -->

// <!-- <table border="1">
//     <tr>
//         <td>Nama</td>
//         <td>{{$nama}}</td>
//     </tr>
//     <tr>
//         <td>Jenis Kelamin</td>
//         <td>{{$jk}}</td>
//     </tr>
// </table> ?>
