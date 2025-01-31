@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Selamat Datang di <strong>Sistem Penilaian Lomba Kicau Burung</strong></h1>
                <p class="lead">Kelola data lomba, peserta, dan penilaian dengan mudah.</p>
                <hr class="my-4">
                <p>Berikut adalah statistik singkat mengenai data yang ada:</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Lomba</h5>
                    <h2 class="card-text">{{ $totalLomba }}</h2>
                    <a href="{{ route('lomba.index') }}" class="btn btn-light">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Peserta</h5>
                    <h2 class="card-text">{{ $totalPeserta }}</h2>
                    <a href="{{ route('peserta.index') }}" class="btn btn-light">Lihat Detail</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-info text-white mb-4">
                <div class="card-body">
                    <h5 class="card-title">Total Penilaian</h5>
                    <h2 class="card-text">{{ $totalPenilaian }}</h2>
                    <a href="{{ route('penilaian.index') }}" class="btn btn-light">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    Lomba Terbaru
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Lomba</th>
                                <th>Tanggal</th>
                                <th>Kategori</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lombaTerbaru as $lomba)
                                <tr>
                                    <td>{{ $lomba->nama_lomba }}</td>
                                    <td>{{ $lomba->tanggal }}</td>
                                    <td>{{ ucfirst($lomba->kategori) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('lomba.index') }}" class="btn btn-primary btn-sm">Lihat Semua Lomba</a>

                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">
                    Peserta Terbaru
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        @foreach ($pesertaTerbaru as $peserta)
                            {{-- <li>{{ $peserta->nama_burung }} ({{ $peserta->user->name }})</li> --}}
                            <li>{{ $peserta->nama_burung }}</li>
                        @endforeach
                    </ul>
                    <a href="{{ route('peserta.index') }}" class="btn btn-primary btn-sm">Lihat Semua Peserta</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection