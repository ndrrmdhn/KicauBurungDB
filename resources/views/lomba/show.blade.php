@extends('layouts.main')

@section('title', $lomba->nama_lomba)

@section('content')
<div class="container">
    <h1>Detail Lomba</h1>

        <div>
            <strong>Nama Lomba:</strong> {{ $lomba->nama_lomba }}
        </div>
        <div>
            <strong>Tanggal:</strong> {{ $lomba->tanggal }}
        </div>
        <div>
            <strong>Lokasi:</strong> {{ $lomba->lokasi }}
        </div>
        <div>
            <strong>Kategori:</strong> {{ ucfirst($lomba->kategori) }}
        </div>
    <a href="{{ route('lomba.index') }}" class="btn btn-secondary" style="margin: 20px 0 20px 0;">Kembali</a>
</div>
@endsection