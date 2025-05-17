<form action="{{ isset($kelas) ? url('kelas/'.$kelas->id) : url('kelas') }}" method="POST">
    @csrf
    @if(isset($kelas))
        @method('PATCH')
    @endif

    Nama Kelas:
    <input type="text" name="nama_kelas" value="{{ old('nama_kelas', $kelas->nama_kelas ?? '') }}"> <br>

    Jurusan:
    <input type="text" name="jurusan" value="{{ old('jurusan', $kelas->jurusan ?? '') }}"> <br>

    Lokasi Ruangan:
    <input type="text" name="lokasi_ruangan" value="{{ old('lokasi_ruangan', $kelas->lokasi_ruangan ?? '') }}"> <br>

    Wali Kelas:
    <input type="text" name="nama_wali_kelas" value="{{ old('nama_wali_kelas', $kelas->nama_wali_kelas ?? '') }}"> <br>

    <button type="submit">Simpan</button>
</form>
