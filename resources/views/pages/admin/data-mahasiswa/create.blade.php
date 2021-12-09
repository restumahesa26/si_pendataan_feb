@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('data-mahasiswa.index') }}">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        <form action="{{ route('data-mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ old('nama') }}">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" placeholder="Masukkan NPM" value="{{ old('npm') }}">
                @error('npm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Masukkan Konfirmasi Password">
                @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi" value="{{ old('prodi') }}">
                @error('prodi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" value="{{ old('angkatan') }}">
                @error('angkatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_sd">Riwayat Pendidikan SD</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_sd') is-invalid @enderror" id="riwayat_pendidikan_sd" name="riwayat_pendidikan_sd" placeholder="Masukkan Riwayat Pendidikan SD" value="{{ old('riwayat_pendidikan_sd') }}">
                @error('riwayat_pendidikan_sd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_sd">File Riwayat Pendidikan SD</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_sd') is-invalid @enderror" id="file_riwayat_pendidikan_sd" name="file_riwayat_pendidikan_sd" placeholder="Masukkan File Riwayat Pendidikan SD" value="{{ old('file_riwayat_pendidikan_sd') }}">
                @error('file_riwayat_pendidikan_sd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_smp">Riwayat Pendidikan SMP</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_smp') is-invalid @enderror" id="riwayat_pendidikan_smp" name="riwayat_pendidikan_smp" placeholder="Masukkan Riwayat Pendidikan SMP" value="{{ old('riwayat_pendidikan_smp') }}">
                @error('riwayat_pendidikan_smp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_smp">File Riwayat Pendidikan SMP</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_smp') is-invalid @enderror" id="file_riwayat_pendidikan_smp" name="file_riwayat_pendidikan_smp" placeholder="Masukkan File Riwayat Pendidikan SMP" value="{{ old('file_riwayat_pendidikan_smp') }}">
                @error('file_riwayat_pendidikan_smp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_sma">Riwayat Pendidikan SMA</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_sma') is-invalid @enderror" id="riwayat_pendidikan_sma" name="riwayat_pendidikan_sma" placeholder="Masukkan Riwayat Pendidikan SMA" value="{{ old('riwayat_pendidikan_sma') }}">
                @error('riwayat_pendidikan_sma')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_sma">File Riwayat Pendidikan SMA</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_sma') is-invalid @enderror" id="file_riwayat_pendidikan_sma" name="file_riwayat_pendidikan_sma" placeholder="Masukkan File Riwayat Pendidikan SMA" value="{{ old('file_riwayat_pendidikan_sma') }}">
                @error('file_riwayat_pendidikan_sma')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="scan_ktp">Scan KTP / SIM</label>
                <input type="file" class="form-control @error('scan_ktp') is-invalid @enderror" id="scan_ktp" name="scan_ktp" placeholder="Masukkan Scan KTP / SIM" value="{{ old('scan_ktp') }}">
                @error('scan_ktp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-block mt-3">Simpan</button>
        </form>
    </div>
</div>
@endsection
