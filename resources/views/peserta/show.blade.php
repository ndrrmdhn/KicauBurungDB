@extends('layouts.main')

@section('title', 'Peserta')

@section('content')
    <h1>Detail Peserta</h1>

    <div>
        <strong>Nama Burung:</strong> {{ $peserta->nama_burung }}
    </div>
    <div>
        <strong>Jenis Burung:</strong> {{ $peserta->jenis_burung }}
    </div>
    <div>
        <strong>User:</strong> {{ $peserta->user->name }}
    </div>
    <div>
        <strong>Lomba:</strong> {{ $peserta->lomba->name }}
    </div>

    <div>
        <a href="{{ route('peserta.index') }}" class="btn btn-secondary" style="margin: 20px 0 20px 0;">Kembali</a>
    </div>
@endsection