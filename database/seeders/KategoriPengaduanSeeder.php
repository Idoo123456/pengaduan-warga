<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriPengaduanSeeder extends Seeder
{
    public function run()
    {
        $kategori = [
            'Infrastruktur',
            'Keamanan',
            'Kebersihan',
            'Kesehatan',
            'Lainnya',
            'Lingkungan',
            'Pelayanan Publik',
            'Pendidikan',
            'Sosial',
            'Transportasi',
        ];

        foreach ($kategori as $nama) {
            DB::table('kategori_pengaduan')->insert([
                'nama'       => $nama, // ✅ SESUAI STRUKTUR TABEL
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
