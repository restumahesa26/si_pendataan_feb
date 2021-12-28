@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kejuaraan</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Kejuaraan</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        <form action="{{ route('kejuaraan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="penyelenggara">Penyelenggara</label>
                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara" value="{{ old('penyelenggara') }}">
                @error('penyelenggara')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-lg-4">
                    <label for="region">Region</label>
                    <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" placeholder="Masukkan Region" value="{{ old('region') }}">
                    @error('region')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-4">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
        <h3 class="text-center mb-2">Kejuaraan</h3>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Penyelenggara</th>
                        <th>Tanggal</th>
                        <th>Region</th>
                        <th>Sertifikat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $kejuaraan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kejuaraan->penyelenggara }}</td>
                            <td>{{ $kejuaraan->tanggal }}</td>
                            <td>{{ $kejuaraan->region }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#gambarModal{{ $kejuaraan->id }}">
                                    Lihat Sertifikat
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalEdit{{ $kejuaraan->id }}">
                                    Edit
                                </button>
                                <form action="{{ route('kejuaraan.destroy', $kejuaraan->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
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
        <div class="modal fade" id="modalEdit{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sertifikat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('kejuaraan.update', $item2->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="penyelenggara">Penyelenggara</label>
                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" placeholder="Masukkan Penyelenggara" value="{{ $item2->penyelenggara }}">
                                @error('penyelenggara')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="region">Region</label>
                                    <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" placeholder="Masukkan Region" value="{{ $item2->region }}">
                                    @error('region')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal" value="{{ $item2->tanggal }}">
                                    @error('tanggal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="file_sertifikat">Ganti File Sertifikat</label>
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
                        <img src="{{ asset('storage/assets/file-sertifikat-kejuaraan/' . $item3->file_sertifikat) }}" alt="" style="width: 800px">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Yakin Menghapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }else {
                    //
                }
            });
        });
    </script>
@endpush
