<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Katanya Sih, Kucing Kantor Diangkat Jadi "Kepala Divisi Anti Tikus"',
                'content' => 'Warga sekitar RT 05 menghebohkan lini masa setelah beredar kabar seekor kucing oren bernama Mochi diangkat secara aklamasi sebagai penanggung jawab keamanan gudang beras. Belum ada konfirmasi resmi dari pihak kelurahan, namun beberapa warga mengaku sudah menyiapkan SK pengangkatan tidak resmi lengkap dengan cap jempol. Sumber kami menyebut Mochi bertugas setiap malam dan mendapat gaji berupa dua ekor ikan asin per minggu.',
                'image' => 'https://picsum.photos/id/219/900/600',
                'publisher' => 'Redaksi Gang Sebelah',
                'category' => 'Unik',
                'tanggal_kejadian' => now()->subDays(1),
                'published' => 'yes',
            ],
            [
                'title' => 'Konon, WiFi Kosan Lebih Kencang Kalau Router Dikasih Sesajen Kopi Hitam',
                'content' => 'Sebuah teori tak berdasar namun cukup populer di kalangan anak kos menyebutkan koneksi internet meningkat drastis setelah router "diberi" secangkir kopi hitam di sampingnya. Tim kami mencoba menelusuri klaim ini dan menemukan bahwa penyebab sebenarnya kemungkinan besar adalah jam sepi pengguna, bukan sesajen. Namun demi menjaga tradisi, beberapa anak kos tetap melanjutkan ritual ini setiap malam minggu.',
                'image' => 'https://picsum.photos/id/60/900/600',
                'publisher' => 'Kabar Burung Teknologi',
                'category' => 'Teknologi',
                'tanggal_kejadian' => now()->subDays(2),
                'published' => 'yes',
            ],
            [
                'title' => 'Isu Beredar: Tukang Bakso Langganan Ternyata Jago Main Catur Level Kabupaten',
                'content' => 'Siapa sangka, di balik gerobak bakso yang mangkal setiap sore di depan gang, tersimpan bakat terpendam bermain catur. Beberapa pelanggan mengaku pernah diajak bermain sambil menunggu pesanan dan langsung kalah telak dalam sepuluh langkah. Sayangnya, sang tukang bakso menolak diwawancarai lebih lanjut dengan alasan "baksonya keburu dingin".',
                'image' => 'https://picsum.photos/id/292/900/600',
                'publisher' => 'Suara Gang',
                'category' => 'Gaya Hidup',
                'tanggal_kejadian' => now()->subDays(3),
                'published' => 'yes',
            ],
            [
                'title' => 'Rumor Kampus: Dosen Killer Ternyata Penggemar Berat Drama Korea',
                'content' => 'Beredar tangkapan layar tidak jelas asal-usulnya yang menunjukkan seorang dosen dikenal tegas dalam mata kuliah pemrograman web ternyata aktif di forum diskusi drama Korea. Mahasiswa yang mendengar kabar ini mulai berspekulasi apakah nilai tugas mereka akan lebih lunak menjelang musim drama baru tayang. Pihak dosen belum memberikan tanggapan resmi.',
                'image' => 'https://picsum.photos/id/180/900/600',
                'publisher' => 'Mading Digital',
                'category' => 'Nasional',
                'tanggal_kejadian' => now()->subDays(4),
                'published' => 'yes',
            ],
            [
                'title' => 'Penelitian Iseng: Motivasi Belajar Mahasiswa Naik 30% Kalau Ada Diskon Kopi Kekinian',
                'content' => 'Sebuah "penelitian" yang dilakukan oleh dua mahasiswa saat menunggu revisi skripsi mengklaim ada korelasi antara promo kopi kekinian dengan tingkat kehadiran di kelas pagi. Meski metodologinya masih perlu dipertanyakan, hasil ini cukup viral di kalangan grup WhatsApp angkatan. Peneliti berencana melanjutkan riset ini hingga skripsi mereka sendiri selesai, entah kapan.',
                'image' => 'https://picsum.photos/id/225/900/600',
                'publisher' => 'Kabar Burung Sains',
                'category' => 'Sains',
                'tanggal_kejadian' => now()->subDays(5),
                'published' => 'yes',
            ],
            [
                'title' => 'Katanya, Tim Futsal RT Menang Turnamen Berkat Jimat Sandal Jepit Kapten',
                'content' => 'Setelah menjuarai turnamen futsal antar RT untuk pertama kalinya, sang kapten tim mengklaim kemenangan tidak lepas dari sandal jepit butut kesayangannya yang selalu dipakai saat pemanasan. Rekan setimnya lebih meyakini kemenangan itu berkat latihan rutin tiga kali seminggu, bukan sandal jepit. Perdebatan ini masih berlangsung hingga saat berita ini diturunkan.',
                'image' => 'https://picsum.photos/id/431/900/600',
                'publisher' => 'Suara Gang',
                'category' => 'Olahraga',
                'tanggal_kejadian' => now()->subDays(6),
                'published' => 'yes',
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}