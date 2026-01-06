<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriPengaduan extends Model
{
    use HasFactory;

    protected $table = 'kategori_pengaduan';

    protected $fillable = ['nama'];

    public function pengaduan()
    {
        return $this->hasMany(
            Pengaduan::class,
            'kategori_pengaduan_id'
        );
    }
}
