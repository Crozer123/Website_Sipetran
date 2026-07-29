<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $appData = [
            'name' => 'Sipetran',
            'tagline' => 'Sistem Informasi & Edukasi Kesehatan, Ekonomi Kreatif, dan Lingkungan Desa',
            'version' => '1.0.0',
            'github_url' => 'https://github.com/Crozer123/Sipetran.git',
            'stats' => [
                ['number' => '10+', 'label' => 'Indikator PHBS'],
                ['number' => '100%', 'label' => 'Gizi Terhitung (AKG)'],
                ['number' => '5', 'label' => 'Modul Lingkungan'],
                ['number' => '2', 'label' => 'Produk Ekraf Unggulan'],
            ],
            'sijago' => [
                'title' => 'Nugget SIJAGO (Singkong, Jagung & Kelor)',
                'description' => 'Inovasi kuliner sehat bergizi tinggi berbasis pangan lokal Desa Gunungsari untuk pencegahan stunting dan pemenuhan gizi keluarga.',
                'nutrition' => [
                    'energi' => 266.37,
                    'kh' => 42.7,
                    'protein' => 13.81,
                    'lemak' => 5.11,
                    'zat_besi' => 2.75,
                ],
                'akg' => [
                    'energi' => '11.8%',
                    'kh' => '11.9%',
                    'protein' => '23%',
                    'lemak' => '7.9%',
                    'zat_besi' => '15.3%',
                ],
                'bahan' => [
                    ['nama' => 'Jagung segar', 'jumlah' => '35 gr', 'energi' => '128.1 kkal', 'protein' => '3.43 gr'],
                    ['nama' => 'Daun Kelor', 'jumlah' => '15 gr', 'energi' => '13.8 kkal', 'protein' => '0.77 gr'],
                    ['nama' => 'Dada Ayam', 'jumlah' => '30 gr', 'energi' => '31.8 kkal', 'protein' => '6.75 gr'],
                    ['nama' => 'Daun Bawang', 'jumlah' => '15 gr', 'energi' => '6.15 kkal', 'protein' => '0.3 gr'],
                    ['nama' => 'Tepung Terigu', 'jumlah' => '5 gr', 'energi' => '16.65 kkal', 'protein' => '0.45 gr'],
                    ['nama' => 'Tepung Tapioka', 'jumlah' => '10 gr', 'energi' => '36 kkal', 'protein' => '0 gr'],
                    ['nama' => 'Telur Ayam', 'jumlah' => '15 gr', 'energi' => '23.1 kkal', 'protein' => '1.86 gr'],
                    ['nama' => 'Bumbu & Rempah (Bawang, Garam, Kaldu, Merica)', 'jumlah' => 'Secukupnya', 'energi' => '10.7 kkal', 'protein' => '0.26 gr'],
                ],
                'langkah' => [
                    'Cuci jagung, pipil lalu timbang sebesar 35 gr, haluskan dengan chopper.',
                    'Pisahkan kelor dari batang (15 gr), cuci lalu rebus dalam air mendidih selama 2-3 menit. Peras & cincang halus.',
                    'Cuci & timbang daging dada ayam (30 gr), haluskan bersama jagung, terigu, tapioka, telur, bumbu & es batu.',
                    'Campurkan adonan halus dengan cincangan kelor, aduk hingga merata.',
                    'Tuang adonan ke dalam loyang yang diolesi minyak, kukus selama 25-30 menit.',
                    'Dinginkan selama 15-30 menit, potong adonan per ±25 gr.',
                    'Balur adonan dengan adonan basah dan tepung panir, lalu goreng dengan api sedang hingga kuning keemasan.'
                ]
            ],
            'siloka' => [
                'title' => 'Kopi SILOKA (Kopi Robusta + Jahe + Sereh)',
                'description' => 'Perpaduan kopi lokal robusta Desa Gunungsari dengan ekstrak rempah jahe dan sereh pilihan untuk menghangatkan tubuh dan meningkatkan daya tahan.',
                'perbandingan' => '10 gr Bubuk SILOKA : 250 ml Air Panas (90-95°C)',
                'langkah_pembuatan' => [
                    'Penjemuran buah kopi matang hingga kadar air mencapai 12–13%.',
                    'Pengupasan kulit hingga menjadi green bean, lalu rested 1 hari.',
                    'Roasting medium sampai aroma khas kopi keluar sempurna.',
                    'Proses resting kopi selama 4–7 hari untuk kematangan rasa optimal.',
                    'Penggilingan (grinding) hingga menjadi bubuk halus/sedang.',
                    'Pencampuran homogen dengan bubuk jahe kering dan bubuk sereh pilihan.'
                ],
                'pemasaran' => [
                    'Penjualan Pre-Order & Kemitraan Toko / Kedai Kopi',
                    'Promosi Digital via Social Media (IG, TikTok, WhatsApp)',
                    'Kerjasama Dinas Koperasi, Perindustrian, dan Perdagangan Bondowoso'
                ]
            ],
            'phbs' => [
                'indikator' => [
                    'Persalinan ditolong tenaga kesehatan',
                    'Memberi ASI eksklusif',
                    'Menimbang balita setiap bulan',
                    'Ketersediaan air bersih',
                    'Mencuci tangan dengan sabun & air mengalir',
                    'Menggunakan jamban sehat',
                    'Memberantas jentik nyamuk',
                    'Makan buah dan sayur setiap hari',
                    'Melakukan aktivitas fisik setiap hari',
                    'Tidak merokok di dalam rumah'
                ],
                'cuci_tangan' => [
                    'Gosok sabun pada kedua telapak tangan',
                    'Gosok kedua punggung tangan secara bergantian',
                    'Gosok sela-sela jari tangan hingga bersih',
                    'Bersihkan ujung jari dengan posisi mengunci',
                    'Gosok dan putar kedua ibu jari secara bergantian',
                    'Gosokkan telapak tangan dengan ujung jari secara memutar'
                ],
                'oralit' => [
                    'Siapkan air yang telah dimasak sebanyak 1 gelas (200 ml)',
                    'Tambahkan gula 1 sendok teh penuh',
                    'Tambahkan garam ¼ sendok teh',
                    'Aduk hingga seluruh bahan larut sempurna'
                ]
            ],
            'lingkungan' => [
                'biopori' => [
                    'manfaat' => 'Meresapkan air hujan, mencegah banjir/genangan, mengolah sampah organik menjadi kompos alami.',
                    'alat' => 'Bor biopori, pipa PVC Ø10cm berlubang, tutup pipa, sampah organik.',
                    'kedalaman' => '80 - 100 cm'
                ],
                'kompos' => [
                    'bahan' => 'Kotoran sapi, Aktivator EM4, Molase/gula merah, Sekam padi, Jerami, Daun kering.',
                    'keunggulan_em4' => 'Proses fermentasi matang lebih cepat, tidak berbau busuk, kaya unsur hara, dan bebas gulma.',
                    'parameter' => 'Warna cokelat gelap/kehitaman, beraroma humus segar, tekstur gembur & remah.'
                ],
                'incinerator' => [
                    'deskripsi' => 'Alat pembakar sampah berbasis drum bekas berkaki & roda dengan sirkulasi udara optimal dan cerobong asap minim emisi.',
                    'boleh' => 'Daun kering, ranting kecil, rumput kering, serasah tanaman.',
                    'dilarang' => 'Plastik, karet, styrofoam, kaleng, kaca, baterai, limbah B3.'
                ]
            ]
        ];

        return view('landing', compact('appData'));
    }

    public function download()
    {
        // GitHub Repository APK release link or download route
        return redirect('https://github.com/Crozer123/Sipetran.git');
    }
}
