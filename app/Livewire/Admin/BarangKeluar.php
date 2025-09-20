<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Obat;

class BarangKeluar extends Component
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
            'obat_id' => 'required|exists:obat,id',
            'jumlah' => 'required|numeric|min:1',
        ]);
        $obat = Obat::find($this->obat_id);
        $obat->jumlah_keluar += $this->jumlah;
        $obat->save();
        $this->sukses = true;
        $this->reset(['obat_id', 'jumlah']);
    }

    public function render()
    {
        $obats = Obat::all();
        return view('livewire.admin.barang-keluar', compact('obats'))->layout('livewire.admin.layout.admin');
    }
}
