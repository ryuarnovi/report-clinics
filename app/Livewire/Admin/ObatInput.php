<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Obat;

class ObatInput extends Component
{
    public $nama, $harga_beli, $harga_jual, $no_batch, $exp_date, $stok_awal;
    public $sukses = false;

    public function mount()
    {
        if(auth()->user()->role !== 'admin'){ abort(403); }
    }

    public function simpan()
    {
        $this->validate([
            'nama' => 'required',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'no_batch' => 'required',
            'exp_date' => 'required|date',
            'stok_awal' => 'required|numeric',
        ]);
        Obat::create([
            'nama' => $this->nama,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'no_batch' => $this->no_batch,
            'exp_date' => $this->exp_date,
            'stok_awal' => $this->stok_awal,
            'jumlah_masuk' => $this->stok_awal,   // <-- jumlah masuk = stok awal
        'jumlah_keluar' => 0, 
        ]);
        $this->sukses = 'Obat berhasil ditambahkan.';
        $this->reset(['nama', 'harga_beli', 'harga_jual', 'no_batch', 'exp_date', 'stok_awal']);
}

    public function render()
    {
        return view('livewire.admin.obat-input')->layout('livewire.admin.layout.admin');
    }
}
