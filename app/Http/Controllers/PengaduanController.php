<?php

namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        if (! $request->session()->has('from_store')) {
            $request->session()->forget('success');
        }

        $request->session()->forget('from_store');

        $pengaduan = Pengaduan::where('user_id', auth()->id())
            ->latest()
            ->paginate(6);

        return view('pengaduan.index', compact('pengaduan'));
    }

    public function create()
    {
        $kategori = KategoriPengaduan::orderBy('nama')->get();
        return view('pengaduan.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'judul'                 => 'required|string|max:255',
            'isi_pengaduan'         => 'required|string',
            'jalan'                 => 'required|string|max:255',
            'rt'                    => 'required|string|max:5',
            'rw'                    => 'required|string|max:5',
            'foto'                  => 'nullable|image|max:2048',
        ]);

        $data = [
            'user_id'               => auth()->id(),
            'kategori_pengaduan_id' => $request->kategori_pengaduan_id,
            'judul'                 => $request->judul,
            'isi_pengaduan'         => $request->isi_pengaduan,
            'jalan'                 => $request->jalan,
            'rt'                    => $request->rt,
            'rw'                    => $request->rw,
            'status'                => 'Dikirim',
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        Pengaduan::create($data);

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil dikirim')
            ->with('from_store', true);
    }

    public function show(Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);
        return view('pengaduan.show', compact('pengaduan'));
    }

    public function edit(Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        $kategori = KategoriPengaduan::orderBy('nama')->get();

        return view('pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    public function update(Request $request, Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        $request->validate([
            'judul'                 => 'required|string|max:255',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'isi_pengaduan'         => 'required|string',
            'jalan'                 => 'required|string|max:255',
            'rt'                    => 'required|string|max:5',
            'rw'                    => 'required|string|max:5',
            'foto'                  => 'nullable|image|max:2048',
        ]);

        $data = [
            'judul'                 => $request->judul,
            'kategori_pengaduan_id' => $request->kategori_pengaduan_id,
            'isi_pengaduan'         => $request->isi_pengaduan,
            'jalan'                 => $request->jalan,
            'rt'                    => $request->rt,
            'rw'                    => $request->rw,
        ];

        if ($request->hasFile('foto')) {

            if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan->update($data);

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan berhasil diperbarui');
    }
}
