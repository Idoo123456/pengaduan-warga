<?php
namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengaduanSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID');

        // Ambil data user
        $users = DB::table('users')->get();

        // Ambil ID kategori
        $kategoriIds = DB::table('kategori_pengaduan')->pluck('id')->toArray();

        // ===== VALIDASI PENTING (BIAR TIDAK ERROR) =====
        if ($users->isEmpty()) {
            throw new \Exception('Seeder GAGAL: tabel users masih kosong');
        }

        if (empty($kategoriIds)) {
            throw new \Exception('Seeder GAGAL: tabel kategori_pengaduan masih kosong');
        }
        // ==============================================

        $statusList = ['Dikirim', 'Diproses', 'Selesai'];

        $judulList = [
            'Jalan Rusak Parah',
            'Sampah Menumpuk',
            'Air Tidak Mengalir',
            'Lampu Jalan Mati',
            'Bau Tidak Sedap',
            'Selokan Tersumbat',
            'Bangunan Liar',
            'Kebisingan Lingkungan',
            'Banjir Saat Hujan',
            'Hewan Ternak Lepas',
        ];

        for ($i = 0; $i < 100; $i++) {

            $user = $users->random();

            DB::table('pengaduans')->insert([
                'user_id'               => $user->id,
                'nama'                  => $user->name,

                'kategori_pengaduan_id' => $faker->randomElement($kategoriIds),

                'judul'                 => $faker->randomElement($judulList),

                'isi_pengaduan'         =>
                'Saya melaporkan bahwa ' .
                strtolower($faker->sentence(6)) .
                '. Mohon segera ditindaklanjuti oleh pihak terkait.',

                'jalan'                 => $faker->streetName,
                'rt'                    => str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT),
                'rw'                    => str_pad($faker->numberBetween(1, 10), 3, '0', STR_PAD_LEFT),

                'status'                => $faker->randomElement($statusList),

                'created_at'            => now(),
                'updated_at'            => now(),
            ]);
        }
    }
}
