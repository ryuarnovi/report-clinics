<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Obat;

class BarangMasuk extends Component
{
    public $obat_id, $jumlah;
    public $sukses = false;

    public function mount()
    {
        if(auth()->user()->role !== 'admin'){ abort(403); }
    }

    public function simpan()
    {
        $this->validate([
            'obat_id' => 'required|exists:obat,id',    // Pastikan nama tabel benar!
            'jumlah' => 'required|numeric|min:1',
        ]);

        $obat = Obat::find($this->obat_id);
        if ($obat) {
            $obat->jumlah_masuk += $this->jumlah;
            $obat->stok_awal += $this->jumlah;    // Ini agar stok bertambah juga!
            $obat->save();
            $this->sukses = 'Barang masuk berhasil ditambahkan!';
        } else {
            $this->sukses = 'Obat tidak ditemukan!';
        }
        $this->reset(['obat_id', 'jumlah']);
    }

    public function render()
    {
        $obats = Obat::all();
        return view('livewire.admin.barang-masuk', compact('obats'))->layout('livewire.admin.layout.admin');
    }
}