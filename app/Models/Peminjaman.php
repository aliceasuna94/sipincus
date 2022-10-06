<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'prodi',
        'kode_infocus',
        'matakuliah',
        'dosen',
        'ruang',
        'nama',
        'stambuk',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'status',
        'item_infocus',
        'item_power',
        'item_hdmi',
        'item_cok',
        'item_penyangga',
    ];

    public function programstudi()
    {
        return $this->belongsTo(Prodi::class, 'prodi', 'kode');
    }

    public function scopeBelumKembali($query)
    {
        return $query->where('status', 0);
    }

    public function scopeSudahKembali($query)
    {
        return $query->where('status', 1);
    }
}
