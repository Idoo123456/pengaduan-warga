<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduans';

    protected $fillable = [
        'nomor_tiket',
        'user_id',
        'kategori_pengaduan_id',
        'nama',
        'email',
        'judul',
        'isi_pengaduan',
        'jalan',
        'rt',
        'rw',
        'foto',
        'status',
    ];

    public function kategoriPengaduan()
    {
        return $this->belongsTo(KategoriPengaduan::class);
    }
}
