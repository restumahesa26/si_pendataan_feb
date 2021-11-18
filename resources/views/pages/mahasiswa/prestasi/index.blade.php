@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Prestasi</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Prestasi</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        <form action="{{ route('prestasi-mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_prestasi">Nama Prestasi</label>
                <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" id="nama_prestasi" name="nama_prestasi" placeholder="Masukkan Nama Prestasi" value="{{ old('nama_prestasi') }}">
                @error('nama_prestasi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label for="jenis_prestasi">Jenis Prestasi</label>
                    <select name="jenis_prestasi" id="jenis_prestasi" class="form-control @error('jenis_prestasi') is-invalid @enderror">
                        <option value="">--Pilih Jenis Prestasi</option>
                        <option value="Prestasi Akademik">Prestasi Akademik</option>
                        <option value="Prestasi Non Akademik">Prestasi Non Akademik</option>
                    </select>
                    @error('jenis_prestasi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <label for="tingkat_prestasi">Tingkat Prestasi</label>
                    <select name="tingkat_prestasi" id="tingkat_prestasi" class="form-control @error('tingkat_prestasi') is-invalid @enderror">
                        <option value="">--Pilih Tingkat Prestasi</option>
                        <option value="Lokal">Lokal</option>
                        <option value="Regional">Regional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasional">Internasional</option>
                    </select>
                    @error('tingkat_prestasi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <label for="tahun">Tahun</label>
                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="{{ old('tahun') }}">
                    @error('tahun')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label for="file_sertifikat">File Sertifikat</label>
                    <input type="file" name="file_sertifikat" id="file_sertifikat" class="form-control @error('tahun') is-invalid @enderror">
                    @error('file_sertifikat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary w-25" type="submit">
                    Simpan
                </button>
            </div>
        </form>
        <hr>
    </div>
</div>

<div class="card mb-5">
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Prestasi</th>
                        <th>Jenis Prestasi</th>
                        <th>Tingkat Prestasi</th>
                        <th>Tahun</th>
                        <th>Sertifikat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_prestasi }}</td>
                            <td>{{ $item->jenis_prestasi }}</td>
                            <td>{{ $item->tingkat_prestasi }}</td>
                            <td>{{ $item->tahun }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#gambarModal{{ $item->id }}">
                                    Lihat Sertifikat
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('prestasi-mahasiswa.destroy', $item->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="7">-- Data Kosong --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @foreach ($items as $item2)
        <div class="modal fade" id="exampleModal{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data Prestasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('prestasi-mahasiswa.update', $item2->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_prestasi">Nama Prestasi</label>
                                <input type="text" class="form-control @error('nama_prestasi') is-invalid @enderror" id="nama_prestasi" name="nama_prestasi" placeholder="Masukkan Nama Prestasi" value="{{ $item->nama_prestasi }}">
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="jenis_prestasi">Jenis Prestasi</label>
                                    <select name="jenis_prestasi" id="jenis_prestasi" class="form-control @error('jenis_prestasi') is-invalid @enderror">
                                        <option value="">--Pilih Jenis Prestasi</option>
                                        <option value="Prestasi Akademik" @if($item2->jenis_prestasi === 'Prestasi Akademik') selected @endif>Prestasi Akademik</option>
                                        <option value="Prestasi Non Akademik" @if($item2->jenis_prestasi === 'Prestasi Non Akademik') selected @endif>Prestasi Non Akademik</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="tingkat_prestasi">Tingkat Prestasi</label>
                                    <select name="tingkat_prestasi" id="tingkat_prestasi" class="form-control @error('tingkat_prestasi') is-invalid @enderror">
                                        <option value="">--Pilih Tingkat Prestasi</option>
                                        <option value="Lokal" @if($item2->tingkat_prestasi === 'Lokal') selected @endif>Lokal</option>
                                        <option value="Regional" @if($item2->tingkat_prestasi === 'Regional') selected @endif>Regional</option>
                                        <option value="Nasional" @if($item2->tingkat_prestasi === 'Nasional') selected @endif>Nasional</option>
                                        <option value="Internasional" @if($item2->tingkat_prestasi === 'Internasional') selected @endif>Internasional</option>
                                    </select>
                                </div>
                                <div class="col-lg-4">
                                    <label for="tahun">Tahun</label>
                                    <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" placeholder="Masukkan Tahun" value="{{ $item->tahun }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="file_sertifikat">File Sertifikat</label>
                                    <input type="file" name="file_sertifikat" id="file_sertifikat" class="form-control">
                                </div>
                                <div class="col-lg-8">
                                    <img src="{{ asset('storage/assets/file-sertifikat/' . $item2->file_sertifikat) }}" alt="" style="width: 400px">
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-primary w-25 mb-4" type="submit">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @foreach ($items as $item3)
        <div class="modal fade" id="gambarModal{{ $item3->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sertifikat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('storage/assets/file-sertifikat/' . $item3->file_sertifikat) }}" alt="" style="width: 800px">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
