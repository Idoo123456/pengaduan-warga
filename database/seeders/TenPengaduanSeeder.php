<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TenPengaduanSeeder extends Seeder
{
    public function run(): void
    {
        $user = DB::table('users')
            ->where('email', 'idook@gmail.com')
            ->first() ?? DB::table('users')->latest('id')->first();

        if (! $user) {
            throw new \RuntimeException('Tidak ada user untuk membuat data pengaduan.');
        }

        $kategori = DB::table('kategori_pengaduan')
            ->pluck('id', 'nama');

        if ($kategori->isEmpty()) {
            throw new \RuntimeException('Kategori pengaduan masih kosong.');
        }

        $items = [
            ['Infrastruktur', 'Jalan Berlubang di Gang Melati', 'Terdapat beberapa lubang cukup dalam yang membahayakan pengendara saat malam hari.', 'Jalan Melati', '001', '002', 'Dikirim'],
            ['Kebersihan', 'Sampah Menumpuk Dekat Pos Ronda', 'Tempat sampah penuh dan mulai menimbulkan bau tidak sedap di sekitar pos ronda.', 'Jalan Kenanga', '002', '001', 'Diproses'],
            ['Keamanan', 'Lampu Jalan Mati', 'Lampu penerangan jalan sudah mati selama beberapa hari sehingga area menjadi gelap.', 'Jalan Mawar', '003', '004', 'Dikirim'],
            ['Lingkungan', 'Selokan Tersumbat', 'Aliran selokan tidak lancar karena tertutup sampah dan tanah setelah hujan.', 'Jalan Anggrek', '004', '003', 'Diproses'],
            ['Kesehatan', 'Genangan Air Menjadi Sarang Nyamuk', 'Ada genangan air yang tidak surut dan dikhawatirkan menjadi tempat berkembang biak nyamuk.', 'Jalan Dahlia', '005', '002', 'Dikirim'],
            ['Pelayanan Publik', 'Pengurusan Surat Terlalu Lama', 'Warga membutuhkan informasi estimasi penyelesaian layanan surat keterangan.', 'Kantor Desa', '006', '001', 'Dikirim'],
            ['Pendidikan', 'Fasilitas Belajar Rusak', 'Beberapa meja belajar di ruang kegiatan warga rusak dan perlu diperbaiki.', 'Balai Warga', '007', '003', 'Diproses'],
            ['Transportasi', 'Parkir Mengganggu Akses Jalan', 'Kendaraan sering parkir sembarangan sehingga akses warga menjadi sempit.', 'Jalan Cempaka', '008', '002', 'Dikirim'],
            ['Sosial', 'Kegiatan Warga Perlu Pendataan', 'Mohon dilakukan pendataan ulang peserta kegiatan sosial agar pembagian bantuan lebih tertib.', 'Jalan Teratai', '009', '004', 'Dikirim'],
            ['Lainnya', 'Papan Informasi Perlu Diperbarui', 'Papan informasi desa sudah kusam dan beberapa pengumuman lama masih tertempel.', 'Balai Desa', '010', '001', 'Diproses'],
        ];

        foreach ($items as $index => [$namaKategori, $judul, $isi, $jalan, $rt, $rw, $status]) {
            DB::table('pengaduans')->updateOrInsert(
                [
                    'user_id' => $user->id,
                    'judul' => $judul,
                ],
                [
                    'nama' => $user->name,
                    'kategori_pengaduan_id' => $kategori[$namaKategori] ?? $kategori->first(),
                    'isi_pengaduan' => $isi,
                    'jalan' => $jalan,
                    'rt' => $rt,
                    'rw' => $rw,
                    'status' => $status,
                    'foto' => null,
                    'created_at' => now()->subMinutes(10 - $index),
                    'updated_at' => now()->subMinutes(10 - $index),
                ]
            );
        }
    }
}
