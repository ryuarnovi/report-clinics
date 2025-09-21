<?php

namespace App\Http\Livewire\Obat;

use Livewire\Volt\Component;
use App\Models\Obat;

class Edit extends Component
{
    public $obat;
    public $nama;
    public $harga_beli;
    public $harga_jual;
    public $no_batch;
    public $exp_date;
    public $stok_awal;
    public $tanggal_produksi;

    public function mount($id)
    {
        $this->obat = Obat::findOrFail($id);
        $this->nama = $this->obat->nama;
        $this->harga_beli = $this->obat->harga_beli;
        $this->harga_jual = $this->obat->harga_jual;
        $this->no_batch = $this->obat->no_batch;
        $this->exp_date = $this->obat->exp_date;
        $this->stok_awal = $this->obat->stok_awal;
        $this->tanggal_produksi = $this->obat->tanggal_produksi;
    }

    public function updateObat()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'no_batch' => 'nullable|string|max:255',
            'exp_date' => 'required|date',
            'stok_awal' => 'required|integer|min:0',
            'tanggal_produksi' => 'nullable|date',
        ]);

        $this->obat->update([
            'nama' => $this->nama,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'no_batch' => $this->no_batch,
            'exp_date' => $this->exp_date,
            'stok_awal' => $this->stok_awal,
            'tanggal_produksi' => $this->tanggal_produksi,
        ]);

        session()->flash('success', 'Obat berhasil diupdate!');
    }
}