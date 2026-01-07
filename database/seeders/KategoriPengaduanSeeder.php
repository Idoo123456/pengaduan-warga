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
            'Lingkungan',
            'Kebersihan',
            'Keamanan',
            'Pelayanan Publik',
            'Kesehatan',
            'Pendidikan',
            'Transportasi',
            'Sosial',
            'Lainnya',
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
