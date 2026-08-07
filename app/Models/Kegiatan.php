<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kegiatan extends Model
{
    protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'deskripsi',
        'tanggal',
        'lokasi',
        'urutan',
    ];

    public function foto(): HasMany
    {
        return $this->hasMany(KegiatanFoto::class, 'kegiatan_id')->orderBy('urutan');
    }

    public function firstFoto()
    {
        return $this->foto()->first();
    }
}
