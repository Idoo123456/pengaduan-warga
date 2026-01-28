<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Tampilkan semua data warga
     */
    public function index()
    {
        $wargas = Warga::latest()->get();
        return view('warga.index', compact('wargas'));
    }

    /**
     * Tampilkan form tambah warga
     */
    public function create()
    {
        return view('warga.create');
    }

    /**
     * Simpan data warga baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:3',
            'email'  => 'required|email|unique:wargas,email',
            'alamat' => 'required|min:5',
        ], [
            'name.required' => 'name wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'alamat.required' => 'Alamat wajib diisi',
        ]);

        Warga::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan');
    }

    /**
     * Tampilkan form edit warga
     */
    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    /**
     * Update data warga
     */
    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'name'   => 'required|min:3',
            'email'  => 'required|email|unique:wargas,email,' . $warga->id,
            'alamat' => 'required|min:5',
        ]);

        $warga->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui');
    }

    /**
     * Hapus data warga
     */
    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()
            ->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus');
    }
}
