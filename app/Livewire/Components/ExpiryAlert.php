<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Obat;
use Carbon\Carbon;

class ExpiryAlert extends Component
{
    public $obatsExpSoon = [];
    public $showToast = true;

    protected $listeners = ['closeToast' => 'hideToast'];

    public function mount()
    {
        $this->obatsExpSoon = Obat::whereDate('exp_date', '>', now())
            ->whereDate('exp_date', '<=', now()->addDays(30))
            ->get();
        // showToast bisa disimpan session jika ingin persist antar reload
        $this->showToast = session()->get('show_expired_toast', true);
    }

    public function hideToast()
    {
        $this->showToast = false;
        session(['show_expired_toast' => false]);
    }

    public function render()
    {
        return view('livewire.components.expiry-alert');
    }
}