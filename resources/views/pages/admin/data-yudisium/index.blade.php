@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Yudisium</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Yudisium</li>
    </ol>
</div>
<div class="card mb-5">
    <div class="card-body">
        <h3 class="text-center text-danger">Belum Diverifikasi</h3>
        <hr>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Masa Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items->where('user.role', 'MAHASISWA') as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->masa_studi }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal{{ $item->id }}">
                                    Lihat
                                </button>
                                <a href="{{ route('data-yudisium.to-alumni', $item->id) }}" class="btn btn-sm btn-primary btn-verifikasi">Verifikasi Sebagai Alumni</a>
                                <form action="{{ route('data-yudisium.destroy', $item->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <!-- Modal -->
                        <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Data Yudisium</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-4">Nama</div>
                                            <div class="col-8">: {{ $item->nama }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">NPM</div>
                                            <div class="col-8">: {{ $item->npm }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Prodi</div>
                                            <div class="col-8">: {{ $item->prodi }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Tempat Lahir</div>
                                            <div class="col-8">: {{ $item->tempat_lahir }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Tanggal Lahir</div>
                                            <div class="col-8">: {{ $item->tanggal_lahir }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Alamat</div>
                                            <div class="col-8">: {{ $item->alamat }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">No. HP</div>
                                            <div class="col-8">: {{ $item->no_hp }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Nama Ayah</div>
                                            <div class="col-8">: {{ $item->nama_ayah }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Nama Ibu</div>
                                            <div class="col-8">: {{ $item->nama_ibu }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Masa Studi</div>
                                            <div class="col-8">: {{ $item->masa_studi }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Umur</div>
                                            <div class="col-8">: {{ $item->umur }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">IPK</div>
                                            <div class="col-8">: {{ $item->ipk }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">Foto</div>
                                            <div class="col-8">: <img src="{{ asset('storage/assets/pas_photo/' . $item->pas_photo) }}" alt="" width="100"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr class="text-center">
                            <td colspan="7">-- Data Kosong --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="card mb-5">
    <div class="card-body">
        <h3 class="text-center text-primary">Sudah Diverifikasi</h3>
        <hr>
        <a href="{{ route('data-yudisium.cetak-excel') }}" class="btn btn-primary my-3">Cetak Data Yudisium</a>
        <a href="{{ route('data-yudisium.hapus-semua-data') }}" class="btn btn-danger my-3 btn-hapus-semua-data">Hapus Semua Data</a>
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Prodi</th>
                        <th>Masa Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items->where('user.role', 'ALUMNI') as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->masa_studi }}</td>
                            <td>
                                <form action="{{ route('data-yudisium.destroy', $item->id) }}" class="d-inline" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus-2">Hapus</button>
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
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ $message }}'
        })
    </script>
    @endif

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

        $('.btn-hapus-2').on('click', function (e) {
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

        $('.btn-hapus-semua-data').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Yakin Menghapus Semua Data?',
                text: "Data Akan Terhapus Permanen",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = form;
                }else {
                    //
                }
            });
        });

        $('.btn-verifikasi').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Yakin Memindah Data Sebagai Alumni?',
                text: "Data Akan Tersimpan",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Konfirmasi',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = form;
                }else {
                    //
                }
            });
        });
    </script>
@endpush
