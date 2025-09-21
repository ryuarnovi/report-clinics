<?php

namespace App\Livewire\Obat;

use Livewire\Component;
use App\Models\Obat;

class EditTanggalObat extends Component
{
    public $obat;
    public $tanggal_produksi;
    public $exp_date;

    public function mount(Obat $obat)
    {
        $this->obat = $obat;
        $this->tanggal_produksi = $obat->tanggal_produksi;
        $this->exp_date = $obat->exp_date;
    }

    public function simpan()
    {
        $this->validate([
            'tanggal_produksi' => 'required|date',
            'exp_date' => 'required|date|after_or_equal:tanggal_produksi'
        ]);

        $this->obat->update([
            'tanggal_produksi' => $this->tanggal_produksi,
            'exp_date' => $this->exp_date,
        ]);

        session()->flash('success', 'Tanggal berhasil diupdate!');
    }

    public function render()
    {
        return view('livewire.admin.obat.edit-tanggal-obat');
    }
}