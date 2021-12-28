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
                                <a href="{{ route('data-yudisium.to-alumni', $item->id) }}" class="btn btn-sm btn-primary btn-verifikasi">Verifikasi Sebagai Alumni</a>
                                <form action="{{ route('data-yudisium.destroy', $item->id) }}" class="d-inline" method="POST">
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
