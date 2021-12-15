@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (Auth::user()->role === 'MAHASISWA' || Auth::user()->role === 'ALUMNI')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $item->user->nama }}">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" placeholder="Masukkan NPM" value="{{ $item->npm }}">
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
                    <option value="Laki-Laki" @if($item->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                    <option value="Perempuan" @if($item->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" class="form-control @error('prodi') is-invalid @enderror" id="prodi" name="prodi" placeholder="Masukkan Prodi" value="{{ $item->prodi }}">
                @error('prodi')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="angkatan">Angkatan</label>
                <input type="text" class="form-control @error('angkatan') is-invalid @enderror" id="angkatan" name="angkatan" placeholder="Masukkan Angkatan" value="{{ $item->angkatan }}">
                @error('angkatan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_sd">Riwayat Pendidikan SD</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_sd') is-invalid @enderror" id="riwayat_pendidikan_sd" name="riwayat_pendidikan_sd" placeholder="Masukkan Riwayat Pendidikan SD" value="{{ $item->riwayat_pendidikan_sd }}">
                @error('riwayat_pendidikan_sd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_sd">File Riwayat Pendidikan SD</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_sd') is-invalid @enderror" id="file_riwayat_pendidikan_sd" name="file_riwayat_pendidikan_sd" placeholder="Masukkan File Riwayat Pendidikan SD" value="{{ $item->file_riwayat_pendidikan_sd }}">
                @error('file_riwayat_pendidikan_sd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_smp">Riwayat Pendidikan SMP</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_smp') is-invalid @enderror" id="riwayat_pendidikan_smp" name="riwayat_pendidikan_smp" placeholder="Masukkan Riwayat Pendidikan SMP" value="{{ $item->riwayat_pendidikan_smp }}">
                @error('riwayat_pendidikan_smp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_smp">File Riwayat Pendidikan SMP</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_smp') is-invalid @enderror" id="file_riwayat_pendidikan_smp" name="file_riwayat_pendidikan_smp" placeholder="Masukkan File Riwayat Pendidikan SMP" value="{{ $item->file_riwayat_pendidikan_smp }}">
                @error('file_riwayat_pendidikan_smp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="riwayat_pendidikan_sma">Riwayat Pendidikan SMA</label>
                <input type="text" class="form-control @error('riwayat_pendidikan_sma') is-invalid @enderror" id="riwayat_pendidikan_sma" name="riwayat_pendidikan_sma" placeholder="Masukkan Riwayat Pendidikan SMA" value="{{ $item->riwayat_pendidikan_sma }}">
                @error('riwayat_pendidikan_sma')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="file_riwayat_pendidikan_sma">File Riwayat Pendidikan SMA</label>
                <input type="file" class="form-control @error('file_riwayat_pendidikan_sma') is-invalid @enderror" id="file_riwayat_pendidikan_sma" name="file_riwayat_pendidikan_sma" placeholder="Masukkan File Riwayat Pendidikan SMA" value="{{ $item->file_riwayat_pendidikan_sma }}">
                @error('file_riwayat_pendidikan_sma')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif
            @if (Auth::user()->role === 'MAHASISWA')
            <div class="form-group">
                <label for="scan_ktp">Scan KTP / SIM</label>
                <input type="file" class="form-control @error('scan_ktp') is-invalid @enderror" id="scan_ktp" name="scan_ktp" placeholder="Masukkan Scan KTP / SIM" value="{{ $item->scan_ktp }}">
                @error('scan_ktp')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif
            @if (Auth::user()->role === 'ALUMNI')
            <div class="form-group">
                <label for="tanggal_masuk">Tanggal Masuk</label>
                <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" id="tanggal_masuk" name="tanggal_masuk" placeholder="Masukkan Tanggal Masuk" value="{{ $item->tanggal_masuk }}">
                @error('tanggal_masuk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tanggal_lulus">Tanggal Lulus</label>
                <input type="date" class="form-control @error('tanggal_lulus') is-invalid @enderror" id="tanggal_lulus" name="tanggal_lulus" placeholder="Masukkan Tanggal Lulus" value="{{ $item->tanggal_lulus }}">
                @error('tanggal_lulus')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ipk">IPK</label>
                <input type="number" step="0.01" class="form-control @error('ipk') is-invalid @enderror" id="ipk" name="ipk" placeholder="Masukkan IPK" value="{{ $item->ipk }}">
                @error('ipk')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="pekerjaan">Status Bekerja</label>
                <select name="pekerjaan" id="pekerjaan" class="form-control">
                    <option hidden>-- Pilih Status Pekerjaan</option>
                    <option value="Belum Bekerja" @if ($item->pekerjaan == 'Belum Bekerja')
                        selected
                    @endif>Belum Bekerja</option>
                    <option value="Pegawai Negeri Sipil" @if ($item->pekerjaan == 'Pegawai Negeri Sipil')
                        selected
                    @endif>Pegawai Negeri Sipil</option>
                    <option value="Wiraswasta" @if ($item->pekerjaan == 'Wiraswasta')
                        selected
                    @endif>Wiraswasta</option>
                    <option value="Karyawan Swasta" @if ($item->pekerjaan == 'Karyawan Swasta')
                        selected
                    @endif>Karyawan Swasta</option>
                    <option value="Dan lainnya" @if ($item->pekerjaan == 'Dan lainnya')
                        selected
                    @endif>Dan lainnya</option>
                </select>
                @error('pekerjaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="tempat_pekerjaan">Pekerjaan</label>
                <input type="text" class="form-control @error('tempat_pekerjaan') is-invalid @enderror" id="tempat_pekerjaan" name="tempat_pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ $item->tempat_pekerjaan }}">
                @error('tempat_pekerjaan')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            @endif
            @if (Auth::user()->role === 'ADMIN')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukkan Nama" value="{{ $item->nama }}">
                @error('nama')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email" value="{{ $item->email }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Ganti Password</label>
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
            @endif
            <hr>
            <button type="submit" class="btn btn-primary btn-block my-3 btn-simpan">Simpan</button>
        </form>
    </div>
</div>

@if (Auth::user()->role != 'ADMIN')
<div class="card mb-5">
    <div class="card-body d-flex justify-content-center">
        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#ijazahSD">
            File Ijazah SD
        </button>

        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#ijazahSMP">
            File Ijazah SMP
        </button>

        <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#ijazahSMA">
            File Ijazah SMA
        </button>

        @if (Auth::user()->role === 'MAHASISWA')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ijazahSCAN">
            File Scan KTP / SIM
        </button>
        @endif
    </div>

    <div class="modal fade" id="ijazahSD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ijazah SD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($item->file_riwayat_pendidikan_sd)
                    <img src="{{ asset('storage/assets/file-riwayat-pendidikan-sd/' . $item->file_riwayat_pendidikan_sd) }}" alt="" srcset=""  width="700">
                    @else
                    <p>Belum ada file</p>
                    @endif

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ijazahSMP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ijazah SMP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($item->file_riwayat_pendidikan_smp)
                    <img src="{{ asset('storage/assets/file-riwayat-pendidikan-smp/' . $item->file_riwayat_pendidikan_smp) }}" alt="" srcset="" width="700">
                    @else
                    <p>Belum ada file</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ijazahSMA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ijazah SMA</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($item->file_riwayat_pendidikan_sma)
                    <img src="{{ asset('storage/assets/file-riwayat-pendidikan-sma/' . $item->file_riwayat_pendidikan_sma) }}" alt="" srcset="" width="700">
                    @else
                    <p>Belum ada file</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if (Auth::user()->role === 'MAHASISWA')
    <div class="modal fade" id="ijazahSCAN" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">KTP / SIM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if ($item->scan_ktp)
                    <img src="{{ asset('storage/assets/scan-ktp/' . $item->scan_ktp) }}" alt="" srcset="" width="700">
                    @else
                    <p>Belum ada file</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endif
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-simpan').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Yakin Ingin Menyimpan Data?',
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
