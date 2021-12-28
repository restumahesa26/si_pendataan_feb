@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Yudisium</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Yudisium</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        @if ($item)
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control " id="nama" name="nama" placeholder="Masukkan Nama"  value="{{ $item->nama }}" readonly>
        </div>
        <div class="form-group">
            <label for="npm">NPM</label>
            <input type="text" class="form-control " id="npm" name="npm" placeholder="Masukkan NPM" value="{{ $item->npm }}" readonly>
        </div>
        <div class="form-group">
            <label for="prodi">Prodi</label>
            <input type="text" class="form-control " id="prodi" name="prodi" placeholder="Masukkan Prodi" value="{{ $item->prodi }}" readonly>
        </div>
        <div class="form-group row">
            <div class="col-lg-6">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" class="form-control " id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ $item->tempat_lahir }}" readonly>
            </div>
            <div class="col-lg-6">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" class="form-control " id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ $item->tanggal_lahir }}" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control " id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ $item->alamat }}" readonly>
        </div>
        <div class="form-group">
            <label for="no_hp">Nomor Handphone</label>
            <input type="text" class="form-control " id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ $item->no_hp }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control " id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{ $item->nama_ayah }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control " id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{ $item->nama_ibu }}" readonly>
        </div>
        <div class="form-group">
            <label for="masa_studi">Masa Studi <span class="text-danger">*<sup>(Tahun - Bulan - Hari)</sup></span></label>
            <input type="text" class="form-control" id="masa_studi" name="masa_studi" placeholder="Masukkan Masa Studi" value="{{ $item->masa_studi }}" readonly>
        </div>
        <div class="form-group">
            <label for="umur">Umur <span class="text-danger">*<sup>(Tahun - Bulan - Hari)</sup></span></label>
            <input type="text" class="form-control " id="umur" name="umur" placeholder="Masukkan Umur" value="{{ $item->umur }}" readonly>
        </div>
        <div class="form-group">
            <label for="ipk">IPK </label>
            <input type="text" class="form-control " id="ipk" name="ipk" placeholder="Masukkan IPK" value="{{ $item->ipk }}" readonly>
        </div>
        <div class="form-group">
            <label for="pas_photo">Pas Photo <span class="text-danger">*<sup>(Ukuran 3 x 4)</sup></span></label>
            <img src="{{ asset('storage/assets/pas_photo/' . $item->pas_photo) }}" alt="" style="width: 150px;">
        </div>
        @else
        <form action="{{ route('yudisium.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama"  value="{{ Auth::user()->nama }}" readonly>
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" placeholder="Masukkan NPM" value="{{ Auth::user()->mahasiswa->npm }}" readonly>
                @error('npm')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi" value="{{ Auth::user()->mahasiswa->prodi }}" readonly>
                @error('prodi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label for="tempat_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}" required>
                    @error('tempat_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label for="tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" value="{{ old('tanggal_lahir') }}" required>
                    @error('tanggal_lahir')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Masukkan Alamat" value="{{ old('alamat') }}" required>
                @error('alamat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor Handphone</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ old('no_hp') }}" required>
                @error('no_hp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" placeholder="Masukkan Nama Ayah" value="{{ old('nama_ayah') }}" required>
                @error('nama_ayah')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" placeholder="Masukkan Nama Ibu" value="{{ old('nama_ibu') }}" required>
                @error('nama_ibu')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="masa_studi">Masa Studi <span class="text-danger">*<sup>(Tahun - Bulan - Hari)</sup></span></label>
                <input type="text" class="form-control @error('masa_studi') is-invalid @enderror" id="masa_studi" name="masa_studi" placeholder="Masukkan Masa Studi" value="{{ old('masa_studi') }}" required>
                @error('masa_studi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="umur">Umur <span class="text-danger">*<sup>(Tahun - Bulan - Hari)</sup></span></label>
                <input type="text" class="form-control @error('umur') is-invalid @enderror" id="umur" name="umur" placeholder="Masukkan Umur" value="{{ old('umur') }}" required>
                @error('umur')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="text" class="form-control @error('ipk') is-invalid @enderror" id="ipk" name="ipk" placeholder="Masukkan IPK" value="{{ old('ipk') }}" required>
                @error('ipk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pas_photo">Pas Photo <span class="text-danger">*<sup>(Ukuran 3 x 4)</sup></span></label>
                <input type="file" class="form-control @error('pas_photo') is-invalid @enderror" id="pas_photo" name="pas_photo" required>
                @error('pas_photo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <hr>
            <button type="submit" class="btn btn-primary btn-block my-3 btn-simpan">Simpan</button>
        </form>
        @endif
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-simpan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Yakin Menyimpan Data?',
            text: "Data Akan Tersimpan",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Simpan',
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
