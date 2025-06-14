@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-2xl font-bold mb-4">Edit Data Pegawai</h2>
    <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nama_pegawai">Nama Pegawai</label>
            <input type="text" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="jk">Jenis Kelamin</label>
            <select name="jk" class="form-control" required>
                <option value="Laki-laki" {{ $pegawai->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $pegawai->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="ttl">Tanggal Lahir</label>
            <input type="date" name="ttl" value="{{ $pegawai->ttl }}" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="no_hp">No HP</label>
            <input type="text" name="no_hp" value="{{ $pegawai->no_hp }}" class="form-control" required
                   pattern="^(\+62|08)[0-9]{9,13}$" maxlength="15"
                   placeholder="+628xxxxxxxxx atau 08xxxxxxxxx">
        </div>

        <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ $pegawai->email }}" class="form-control" required>
        </div>

        <div class="form-group mb-4">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
