<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use App\Models\Lomba;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::all();
        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        $users = User::all(); 
        $lombas = Lomba::all(); 
        return view('peserta.create', compact('users', 'lombas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lomba_id' => 'required|exists:lombas,id',
            'nama_burung' => 'required|string|max:255',
            'jenis_burung' => 'required|string|max:255',
        ]);

        Peserta::create($request->all()); 

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan');
    }

    public function show(Peserta $peserta)
    {
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $users = User::all(); 
        $lombas = Lomba::all(); 
        return view('peserta.edit', compact('peserta', 'users', 'lombas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lomba_id' => 'required|exists:lombas,id',
            'nama_burung' => 'required|string|max:255',
            'jenis_burung' => 'required|string|max:255',
        ]);

        $peserta->update($request->all()); 

        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil diperbarui');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete(); 
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus');
    }
}
