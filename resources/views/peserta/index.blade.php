@extends('layouts.main')

@section('title', 'Peserta')

@section('content')
    <h1>Daftar Peserta</h1>
    <a href="{{ route('peserta.create') }}" class="btn btn-primary mb-3">Tambah Peserta</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Nama Burung</th>
                <th>Jenis Burung</th>
                <th>User</th>
                <th>Lomba</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesertas as $peserta)
                <tr>
                    <td>{{ $peserta->nama_burung }}</td>
                    <td>{{ $peserta->jenis_burung }}</td>
                    <td>{{ $peserta->user->name }}</td>
                    <td>{{ $peserta->lomba->nama_lomba }}</td>
                    <td>
                        <a href="{{ route('peserta.show', $peserta) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('peserta.edit', $peserta) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('peserta.destroy', $peserta) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection