@extends('layouts.main')

@section('title', 'Pennilaian')

@section('content')
<div class="container">
    <h2>Detail Penilaian</h2>

    <ul class="list-group">
        <li class="list-group-item"><strong>Peserta:</strong> {{ $penilaian->peserta->nama_burung }}</li>
        <li class="list-group-item"><strong>Juri:</strong> {{ $penilaian->juri->name }}</li>
        <li class="list-group-item"><strong>Kriteria:</strong> {{ ucfirst($penilaian->kriteria) }}</li>
        <li class="list-group-item"><strong>Skor:</strong> {{ $penilaian->skor }}</li>
    </ul>

    <a href="{{ route('penilaian.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection