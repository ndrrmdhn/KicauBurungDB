<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index()
    {
        $penilaians = Penilaian::with(['peserta', 'juri'])->get();
        return view('penilaian.index', compact('penilaians'));
    }

    public function create()
    {
        $pesertas = Peserta::all();
        $juris = User::all();
        return view('penilaian.create', compact('pesertas', 'juris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'juri_id' => 'required|exists:users,id',
            'kriteria' => 'required|in:suara,durasi,variasi',
            'skor' => 'required|integer|min:0|max:100',
        ]);

        Penilaian::create($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil ditambahkan.');
    }

    public function show(Penilaian $penilaian)
    {
        return view('penilaian.show', compact('penilaian'));
    }

    public function edit(Penilaian $penilaian)
    {
        $pesertas = Peserta::all();
        $juris = User::all();
        return view('penilaian.edit', compact('penilaian', 'pesertas', 'juris'));
    }

    public function update(Request $request, Penilaian $penilaian)
    {
        $request->validate([
            'peserta_id' => 'required|exists:pesertas,id',
            'juri_id' => 'required|exists:users,id',
            'kriteria' => 'required|in:suara,durasi,variasi',
            'skor' => 'required|integer|min:0|max:100',
        ]);

        $penilaian->update($request->all());

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil diperbarui.');
    }

    public function destroy(Penilaian $penilaian)
    {
        $penilaian->delete();

        return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil dihapus.');
    }
}
