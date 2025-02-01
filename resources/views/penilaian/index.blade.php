@extends('layouts.main')

@section('title', 'Penilaian')

@section('content')
<div class="container">
    <a href="{{ route('penilaian.create') }}" class="btn btn-primary mb-3">Tambah Penilaian</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Peserta</th>
                <th>Juri</th>
                <th>Kriteria</th>
                <th>Skor</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penilaians as $key => $penilaian)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $penilaian->peserta->nama_burung }}</td>
                <td>{{ $penilaian->juri->name }}</td>
                <td>{{ ucfirst($penilaian->kriteria) }}</td>
                <td>{{ $penilaian->skor }}</td>
                <td>
                    <a href="{{ route('penilaian.show', $penilaian->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('penilaian.edit', $penilaian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('penilaian.destroy', $penilaian->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection