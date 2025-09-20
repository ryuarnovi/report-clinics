<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obat'; // atau 'obats' sesuai tabel
    protected $fillable = [
        'nama', 'harga_beli', 'harga_jual', 'no_batch', 'exp_date', 'stok_awal', 'jumlah_masuk', 'jumlah_keluar'
    ];
    public function getSisaStokAttribute()
    {
        return $this->stok_awal + $this->jumlah_masuk - $this->jumlah_keluar;
    }
    public function getLabaAttribute()
    {
        return ($this->harga_jual - $this->harga_beli) * $this->jumlah_keluar;
    }
}
