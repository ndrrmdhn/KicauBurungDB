@extends('layouts.main')

@section('title', 'Peserta')

@section('content')
    <h1>Edit Peserta</h1>
    <form action="{{ route('peserta.update', $peserta) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">User</label>
            <select name="user_id" id="user_id" class="form-control">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" @if ($user->id == $peserta->user_id) selected @endif>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="lomba_id">Lomba</label>
            <select name="lomba_id" id="lomba_id" class="form-control">
                @foreach ($lombas as $lomba)
                    <option value="{{ $lomba->id }}" @if ($lomba->id == $peserta->lomba_id) selected @endif>{{ $lomba->nama_lomba }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_burung">Nama Burung</label>
            <input type="text" name="nama_burung" id="nama_burung" value="{{ $peserta->nama_burung }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="jenis_burung">Jenis Burung</label>
            <input type="text" name="jenis_burung" id="jenis_burung" value="{{ $peserta->jenis_burung }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary" style="margin: 20px 0 20px 0;">Simpan</button>
        <a href="{{ route('peserta.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
@endsection