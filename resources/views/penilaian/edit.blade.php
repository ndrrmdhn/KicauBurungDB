@extends('layouts.main')

@section('title', 'Pennilaian')

@section('content')
<div class="container">
    <h2>Edit Penilaian</h2>

    <form action="{{ route('penilaian.update', $penilaian->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="peserta_id" class="form-label">Peserta</label>
            <select name="peserta_id" class="form-control" required>
                <option value="">-- Pilih Peserta --</option>
                @foreach($pesertas as $peserta)
                    <option value="{{ $peserta->id }}" {{ $penilaian->peserta_id == $peserta->id ? 'selected' : '' }}>
                        {{ $peserta->nama_burung }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="juri_id" class="form-label">Juri</label>
            <select name="juri_id" class="form-control" required>
                <option value="">-- Pilih Juri --</option>
                @foreach($juris as $juri)
                    <option value="{{ $juri->id }}" {{ $penilaian->juri_id == $juri->id ? 'selected' : '' }}>
                        {{ $juri->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="kriteria" class="form-label">Kriteria</label>
            <select name="kriteria" class="form-control" required>
                <option value="suara" {{ $penilaian->kriteria == 'suara' ? 'selected' : '' }}>Suara</option>
                <option value="durasi" {{ $penilaian->kriteria == 'durasi' ? 'selected' : '' }}>Durasi</option>
                <option value="variasi" {{ $penilaian->kriteria == 'variasi' ? 'selected' : '' }}>Variasi</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="skor" class="form-label">Skor</label>
            <input type="number" name="skor" class="form-control" min="0" max="100" value="{{ $penilaian->skor }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('penilaian.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection