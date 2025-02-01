@extends('layouts.main')

@section('title', 'Daftar Lomba')

@section('content')
<div class="container">
    <a href="{{ route('lomba.create') }}" class="btn btn-primary mb-3">Tambah Lomba</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lomba</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lombas as $lomba)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $lomba->nama_lomba }}</td>
                    <td>{{ $lomba->tanggal }}</td>
                    <td>{{ $lomba->lokasi }}</td>
                    <td>{{ ucfirst($lomba->kategori) }}</td>
                    <td>
                        <a href="{{ route('lomba.show', $lomba) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('lomba.edit', $lomba) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('lomba.destroy', $lomba) }}" method="POST" style="display:inline-block;">
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