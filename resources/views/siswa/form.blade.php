@session('error')
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endSession

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Perhatian!</strong>
        <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<!-- <h1>Form Siswa</h1>

<form action="{{ url('siswa') }}" method="POST">
    @csrf

    <label for="nis">NIS:</label>
    <input type="text" name="nis" id="nis" value="{{ old('nis') }}"> <br><br>

    <label for="nama_lengkap">Nama Lengkap:</label>
    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}"> <br><br>

    <label>Jenis Kelamin:</label><br>
    <label for="L">
        <input type="radio" name="jenis_kelamin" id="L" value="L" {{ old('jenis_kelamin') == 'L' ? 'checked' : '' }}> Laki-laki
    </label><br>
    <label for="P">
        <input type="radio" name="jenis_kelamin" id="P" value="P" {{ old('jenis_kelamin') == 'P' ? 'checked' : '' }}> Perempuan
    </label><br><br>

    <label for="goldar">Golongan Darah:</label>
    <select name="goldar" id="goldar">
        <option value="">Pilih Golongan Darah</option>
        <option value="A" {{ old('goldar') == 'A' ? 'selected' : '' }}>A</option>
        <option value="B" {{ old('goldar') == 'B' ? 'selected' : '' }}>B</option>
        <option value="AB" {{ old('goldar') == 'AB' ? 'selected' : '' }}>AB</option>
        <option value="O" {{ old('goldar') == 'O' ? 'selected' : '' }}>O</option>
    </select><br><br>

    <input type="submit" value="Simpan">
</form> -->


<h1>Form Siswa</h1>

<form action="{{ url('siswa', @$siswa->id) }}" method="POST">
    @csrf

    @if (!empty(@$siswa))
        @method('PATCH')
    @endif

    NIS : <input type="text" name="nis" value="{{ old('nis', @$siswa->nis) }}"><br>
    Nama Lengkap : <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', @$siswa->nama_lengkap) }}"><br>
    Jenis Kelamin : <br>
    <label for="L"><input type="radio" name="jenis_kelamin" id="L" value="L" {{ old('jenis_kelamin', @$siswa->jenis_kelamin) == "L" ? "checked" : "" }}>Laki-laki</label><br>
    <label for="P"><input type="radio" name="jenis_kelamin" id="P" value="P" {{ old('jenis_kelamin', @$siswa->jenis_kelamin) == "P" ? "checked" : "" }}>Perempuan</label><br>
    Golongan Darah :
    <select name="goldar">
    <option value="">Pilih Golongan Darah</option>
        <option value="A" {{ old('goldar', @$siswa->goldar)  == "A" ? "selected" : "" }}>A</option>
        <option value="B" {{ old('goldar', @$siswa->goldar)  == "B" ? "selected" : "" }}>B</option>
        <option value="AB" {{ old('goldar', @$siswa->goldar)  == "AB" ? "selected" : "" }}>AB</option>
        <option value="O" {{ old('goldar', @$siswa->goldar)  == "O" ? "selected" : "" }}>O</option>
    </select>
    <input type="submit" value="Simpan">
</form>