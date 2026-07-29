# Website Sipetran (Laravel Framework)

Landing page & website showcase untuk **Aplikasi Sipetran** (Sistem Informasi & Edukasi Kesehatan, Ekonomi Kreatif, dan Lingkungan Desa Gunungsari, Bondowoso).

Terinspirasi dari tampilan modern dan interaktif [LastBite](https://lastbite-zeta.vercel.app/).

---

## 🌟 Fitur Utama Website

1. **Hero & Mobile App Simulator**: Mockup tampilan aplikasi mobile Sipetran dengan badge interaktif dan CTA download APK.
2. **Resep & Kalkulator Gizi Nugget SIJAGO**:
   - Takaran bahan & langkah pembuatan.
   - Breakdown kandungan gizi (266.37 kkal, 13.81g Protein) & indikator %AKG.
3. **Produk Ekraf Kopi SILOKA**:
   - Formulasi kopi Robusta + Jahe + Sereh.
   - Panduan penjemuran, roasting, resting 4-7 hari, dan rasio penyeduhan.
   - Strategi pemasaran & kemitraan UMKM Diskopdag Bondowoso.
4. **Kesehatan & PHBS**:
   - 10 Indikator Perilaku Hidup Bersih & Sehat (PHBS).
   - 6 Langkah Cuci Tangan pakai sabun.
   - Formula & Tips Larutan Oralit Darurat.
5. **Edukasi Lingkungan Interaktif**:
   - Klasifikasi pemilahan sampah (Organik, Anorganik, B3, Residu).
   - Panduan teknis Biopori (Diameter 10cm, kedalaman 80-100cm).
   - Kompos Kotoran Sapi (EM4 vs Tanpa EM4 & Parameter Kematangan).
   - Panduan Reboisasi & Pembakar Sampah Minim Asap (Incinerator Drum).
6. **Unduh App & GitHub Repository**:
   - Direct link ke repository GitHub: [https://github.com/Crozer123/Sipetran.git](https://github.com/Crozer123/Sipetran.git).

---

## 🚀 Cara Menjalankan Website (Local Development)

### Persyaratan System:
- PHP 8.2+ (Terinstall di `C:\php\php.exe`)
- Composer (Terinstall di `C:\composer\composer.phar`)

### Menjalankan Development Server:
Jalankan perintah berikut di PowerShell / Terminal:
```powershell
# Menggunakan Artisan
C:\php\php.exe artisan serve

# Atau menggunakan Built-in PHP Server
C:\php\php.exe -S localhost:8000 -t public
```
Akses website melalui browser di: **`http://localhost:8000`**

---

## 📁 Struktur Folder Proyek

```
Website_Sipetran/
├── app/
│   └── Http/
│       └── Controllers/
│           ├── Controller.php
│           └── HomeController.php
├── bootstrap/
│   ├── app.php
│   └── providers.php
├── config/
│   ├── app.php
│   ├── view.php
│   └── session.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── landing.blade.php
├── routes/
│   ├── web.php
│   └── console.php
├── public/
│   └── index.php
├── .env
├── composer.json
└── README.md
```
