@extends('layouts.main')

@section('title', 'Tambah Lomba')

@section('content')
<div class="container">
    <h1>Tambah Lomba</h1>
    <form action="{{ route('lomba.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_lomba" class="form-label">Nama Lomba</label>
            <input type="text" class="form-control" id="nama_lomba" name="nama_lomba" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="lokasi" name="lokasi" required>
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-control" id="kategori" name="kategori" required>
                <option value="murai batu">Murai Batu</option>
                <option value="cucak ijo">Cucak Ijo</option>
                <option value="kenari">Kenari</option>
                <option value="lovebird">Lovebird</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('lomba.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection