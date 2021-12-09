@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

@if (Auth::user()->role === 'ADMIN')
<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Mahasiswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $mahasiswa }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tag fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Earnings (Annual) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Alumni</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $alumni }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Yudisium Terbaru</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $yudisium }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-address-card fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Data Berita</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $berita }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-newspaper fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (Auth::user()->role === 'MAHASISWA' || Auth::user()->role === 'ALUMNI')
<div class="card">
    <div class="card-body">
        <h3>Selamat Datang di Sistem Informasi Manajemen FEB, {{ Auth::user()->nama }}</h3>
    </div>
</div>
@endif

@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if ($message = Session::get('success-login'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil Login',
            text: '{{ $message }}'
        })
    </script>
    @endif
@endpush


