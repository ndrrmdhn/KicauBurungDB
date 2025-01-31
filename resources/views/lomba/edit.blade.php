@extends('layouts.main')

@section('title', 'Edit Lomba')

@section('content')
<div class="container">
    <h1>Edit Lomba</h1>
    <form action="{{ route('lomba.update', $lomba) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_lomba" class="form-label">Nama Lomba</label>
            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" value="{{ old('nama_lomba', $lomba->nama_lomba) }}" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $lomba->tanggal->format('Y-m-d')) }}" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $lomba->lokasi) }}" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="murai batu" {{ old('kategori', $lomba->kategori) == 'murai batu' ? 'selected' : '' }}>Murai Batu</option>
                <option value="cucak ijo" {{ old('kategori', $lomba->kategori) == 'cucak ijo' ? 'selected' : '' }}>Cucak Ijo</option>
                <option value="kenari" {{ old('kategori', $lomba->kategori) == 'kenari' ? 'selected' : '' }}>Kenari</option>
                <option value="lovebird" {{ old('kategori', $lomba->kategori) == 'lovebird' ? 'selected' : '' }}>Lovebird</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('lomba.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
