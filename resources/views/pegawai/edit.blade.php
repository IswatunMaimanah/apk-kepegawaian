@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Data Pegawai</h2>
        <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST">
            @csrf
            @method('PUT') <!-- Menggunakan metode PUT karena ini adalah update -->

            <div class="form-group">
                <label for="nama_pegawai">Nama Pegawai</label>
                <input type="text" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" class="form-control" required>
                    <option value="Laki-laki" {{ $pegawai->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ $pegawai->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="ttl">Tempat & Tanggal Lahir</label>
                <input type="text" name="ttl" value="{{ $pegawai->ttl }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="no_hp">No HP</label>
                <input type="text" name="no_hp" value="{{ $pegawai->no_hp }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $pegawai->email }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" value="{{ $pegawai->jabatan }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
