<?php
namespace App\Http\Controllers;

use App\Models\KategoriPengaduan;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PengaduanController extends Controller
{
    /* ================= INDEX ================= */
    public function index(Request $request)
    {
        // ❗ HANYA PENGADUAN BELUM SELESAI
        $query = Pengaduan::where('user_id', auth()->id())
            ->where('status', '!=', 'Selesai');

        /* 🔍 SEARCH */
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('judul', 'like', '%' . $request->search . '%')
                    ->orWhere('isi_pengaduan', 'like', '%' . $request->search . '%')
                    ->orWhere('jalan', 'like', '%' . $request->search . '%');
            });
        }

        /* 🏷️ FILTER STATUS */
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        /* 🗂️ FILTER KATEGORI */
        if ($request->filled('kategori')) {
            $query->where('kategori_pengaduan_id', $request->kategori);
        }

        $pengaduan = $query
            ->latest()
            ->paginate(6)
            ->withQueryString();

        $kategori = KategoriPengaduan::orderBy('nama')->get();

        return view('pengaduan.index', compact('pengaduan', 'kategori'));
    }

    /* ================= RIWAYAT ================= */
    public function riwayat()
    {
        $userId = auth()->id();

        // DATA RIWAYAT (PAGINATION)
        $pengaduan = Pengaduan::where('user_id', $userId)
            ->where('status', 'Selesai')
            ->latest()
            ->paginate(6);

        // ================= STATISTIK REALTIME =================
        $total   = Pengaduan::where('user_id', $userId)->count();
        $selesai = Pengaduan::where('user_id', $userId)
            ->where('status', 'Selesai')
            ->count();
        $belum = Pengaduan::where('user_id', $userId)
            ->where('status', '!=', 'Selesai')
            ->count();

        return view('pengaduan.riwayat', compact(
            'pengaduan',
            'total',
            'selesai',
            'belum'
        ));
    }

    /* ================= CREATE ================= */
    public function create()
    {
        $kategori = KategoriPengaduan::orderBy('nama')->get();
        return view('pengaduan.create', compact('kategori'));
    }

    /* ================= STORE ================= */
    public function store(Request $request)
    {
        $request->validate([
            'judul'                 => 'required|string|max:255',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'isi_pengaduan'         => 'required|string',
            'jalan'                 => 'required|string',
            'rt'                    => 'required|string',
            'rw'                    => 'required|string',
            'foto'                  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'user_id'               => auth()->id(),
            'nama'                  => auth()->user()->name,
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
            ->with('success', 'Pengaduan Anda berhasil ditambahkan.');
    }

    /* ================= SHOW ================= */
    public function show(Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);
        return view('pengaduan.show', compact('pengaduan'));
    }

    /* ================= EDIT ================= */
    public function edit(Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        $kategori = KategoriPengaduan::orderBy('nama')->get();
        return view('pengaduan.edit', compact('pengaduan', 'kategori'));
    }

    /* ================= UPDATE ================= */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        $request->validate([
            'judul'                 => 'required|string|max:255',
            'kategori_pengaduan_id' => 'required|exists:kategori_pengaduan,id',
            'isi_pengaduan'         => 'required|string',
            'jalan'                 => 'required|string',
            'rt'                    => 'required|string',
            'rw'                    => 'required|string',
            'foto'                  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'judul',
            'kategori_pengaduan_id',
            'isi_pengaduan',
            'jalan',
            'rt',
            'rw',
        ]);

        if ($request->has('hapus_foto')) {
            if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }

            $data['foto'] = null;
        }

        if ($request->hasFile('foto')) {
            if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
                Storage::disk('public')->delete($pengaduan->foto);
            }
            $data['foto'] = $request->file('foto')->store('pengaduan', 'public');
        }

        $pengaduan->update($data);

        return redirect()
            ->route('pengaduan.show', $pengaduan->id)
            ->with('success', 'Pengaduan Anda berhasil diperbarui.');

    }

    /* ================= DESTROY ================= */
    public function destroy(Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        if ($pengaduan->foto && Storage::disk('public')->exists($pengaduan->foto)) {
            Storage::disk('public')->delete($pengaduan->foto);
        }

        $pengaduan->delete();

        return redirect()
            ->route('pengaduan.index')
            ->with('success', 'Pengaduan Anda berhasil dihapus.');

    }
    /* ================= SUBMIT RATING ================= */
    public function submitRating(Request $request, Pengaduan $pengaduan)
    {
        // 🔐 Keamanan
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        // ❌ Hanya pengaduan selesai
        if ($pengaduan->status !== 'Selesai') {
            return back()->with('error', 'Penilaian hanya bisa dikirim untuk pengaduan yang sudah selesai.');
        }

        // ❌ Tidak boleh kirim dua kali
        if ($pengaduan->rating !== null) {
            return back()->with('error', 'Anda sudah memberi penilaian untuk pengaduan ini.');
        }

        // ✅ Validasi
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string|max:1000',
        ], [
            'rating.required' => 'Pilih jumlah bintang terlebih dahulu.',
            'rating.integer' => 'Nilai penilaian tidak valid.',
            'rating.min' => 'Nilai penilaian tidak valid.',
            'rating.max' => 'Nilai penilaian tidak valid.',
            'ulasan.max' => 'Ulasan maksimal 1000 karakter.',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', $validator->errors()->first());
        }

        // 💾 Simpan
        $pengaduan->update([
            'rating' => (int) $request->rating,
            'ulasan' => $request->ulasan,
        ]);

        return back()->with('success', 'Penilaian Anda berhasil dikirim.');

        return back()->with('success', 'Terima kasih atas penilaian Anda 🙏');
    }

    /* ================= RATING ================= */
    public function rating(Request $request, Pengaduan $pengaduan)
    {
        abort_if($pengaduan->user_id !== auth()->id(), 403);

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'nullable|string|max:500',
        ]);

        // ❗ HANYA BOLEH NILAI SEKALI
        if ($pengaduan->rating) {
            return back()->with('error', 'Pengaduan sudah dinilai.');
        }

        $pengaduan->update([
            'rating' => $request->rating,
            'ulasan' => $request->ulasan,
        ]);

        return back()->with('success', 'Terima kasih sudah memberikan rating 🙏');

    }

}
