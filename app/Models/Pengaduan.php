<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    /**
     * ================= MASS ASSIGNMENT =================
     */
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'kategori_pengaduan_id',
        'judul',
        'isi_pengaduan',
        'jalan',
        'rt',
        'rw',
        'status',
        'foto',
        'rating', // ⭐ rating dari warga
        'ulasan', // 💬 komentar untuk petugas
    ];

    /**
     * ================= CASTING =================
     * Biar aman & rapi
     */
    protected $casts = [
        'rating' => 'integer',
    ];

    /**
     * ================= RELATION =================
     */

    // 🔗 Pengaduan → Kategori
    public function kategori()
    {
        return $this->belongsTo(
            KategoriPengaduan::class,
            'kategori_pengaduan_id'
        );
    }

    // 🔗 Pengaduan → User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * ================= HELPER =================
     */

    // 🔥 Cek apakah pengaduan sudah selesai
    public function isSelesai(): bool
    {
        return $this->status === 'Selesai';
    }

    // 🔥 Cek apakah sudah diberi rating
    public function hasRating(): bool
    {
        return ! is_null($this->rating);
    }
}
