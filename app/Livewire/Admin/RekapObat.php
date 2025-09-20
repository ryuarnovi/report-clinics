<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Obat;

class RekapObat extends Component
{
    public function mount()
    {
        if(auth()->user()->role !== 'admin'){ abort(403); }
    }

    public function render()
    {
        $obats = Obat::all();
        return view('livewire.admin.rekap-obat', compact('obats'))->layout('livewire.admin.layout.admin');
    }
}