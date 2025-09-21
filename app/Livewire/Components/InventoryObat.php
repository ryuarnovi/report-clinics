<?php

namespace App\Livewire\Components;

use Livewire\Component;

class InventoryObat extends Component
{
    public function goToInventory()
    {
        if (auth()->user()->role !== 'admin') {
            $this->dispatchBrowserEvent('toast');
        } else {
            return redirect()->route('admin.rekap-obat');
        }
    }

    public function render()
    {
        return view('livewire.components.inventory-obat');
    }
}