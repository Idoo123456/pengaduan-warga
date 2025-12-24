<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    /**
     * Tampilkan form pengaduan
     */
    public function create()
    {
        return view('pengaduan.form');
    }

    /**
     * Simpan pengaduan
     */
    public function store(Request $request)
    {
        // =====================
        // VALIDATION
        // =====================
        $request->validate(
            [
                'nama'     => 'required|min:3',
                'email'    => 'required|email',
                'judul'    => 'required|min:5',
                'kategori' => 'required',
                'isi'      => 'required|min:10',
            ],
            [
                'nama.required'     => 'Nama wajib diisi',
                'email.required'    => 'Email wajib diisi',
                'email.email'       => 'Format email tidak valid',
                'judul.required'    => 'Judul pengaduan wajib diisi',
                'kategori.required' => 'Kategori wajib dipilih',
                'isi.required'      => 'Isi pengaduan wajib diisi',
            ]
        );

        // =====================
        // (NANTI SIMPAN KE DB)
        // =====================

        // =====================
        // REDIRECT + FLASH
        // =====================
        return redirect()
            ->route('pengaduan.create')
            ->with('success', 'Pengaduan berhasil dikirim. Terima kasih!');
    }
}
