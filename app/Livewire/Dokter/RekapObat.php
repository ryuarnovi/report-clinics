<?php

namespace App\Livewire\Dokter;

use Livewire\Component;
use App\Models\Obat;

class RekapObat extends Component
{
    public function mount()
    {
        if(auth()->user()->role !== 'dokter'){ abort(403); }
    }

    public function render()
    {
        $obats = Obat::all();
        return view('livewire.dokter.rekap-obat', compact('obats'))->layout('livewire.dokter.layout.dokter');
    }
}
