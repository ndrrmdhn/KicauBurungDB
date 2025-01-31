@extends('layouts.main')

@section('title', 'Pennilaian')

@section('content')
<div class="container">
    <h2>Tambah Penilaian</h2>

    <form action="{{ route('penilaian.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="peserta_id" class="form-label">Peserta</label>
            <select name="peserta_id" class="form-control" required>
                <option value="">-- Pilih Peserta --</option>
                @foreach($pesertas as $peserta)
                    <option value="{{ $peserta->id }}">{{ $peserta->nama_burung }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="juri_id" class="form-label">Juri</label>
            <select name="juri_id" class="form-control" required>
                <option value="">-- Pilih Juri --</option>
                @foreach($juris as $juri)
                    <option value="{{ $juri->id }}">{{ $juri->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kriteria" class="form-label">Kriteria</label>
            <select name="kriteria" class="form-control" required>
                <option value="suara">Suara</option>
                <option value="durasi">Durasi</option>
                <option value="variasi">Variasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="skor" class="form-label">Skor</label>
            <input type="number" name="skor" class="form-control" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection