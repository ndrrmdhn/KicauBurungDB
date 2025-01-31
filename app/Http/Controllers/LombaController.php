<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;

class LombaController extends Controller
{
    public function index()
    {
        $lombas = Lomba::all();
        return view('lomba.index', compact('lombas'));
    }

    public function create()
    {
        return view('lomba.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:murai batu,cucak ijo,kenari,lovebird',
        ]);

        Lomba::create($request->all());
        return redirect()->route('lomba.index')->with('success', 'Lomba berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('lomba.show', compact('lomba'));
    }

    public function edit(string $id)
    {
        $lomba = Lomba::findOrFail($id);
        return view('lomba.edit', compact('lomba'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lomba' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'lokasi' => 'required|string|max:255',
            'kategori' => 'required|in:murai batu,cucak ijo,kenari,lovebird',
        ]);

        $lomba = Lomba::findOrFail($id);
        $lomba->update($request->all());

        return redirect()->route('lomba.index')->with('success', 'Lomba berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $lomba = Lomba::findOrFail($id);
        $lomba->delete();

        return redirect()->route('lomba.index')->with('success', 'Lomba berhasil dihapus!');
    }
}
