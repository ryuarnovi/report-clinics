<?php

use Livewire\Volt\Component;
use App\Models\Obat;

return new class extends Component {
    public $nama = '';
    public $harga_beli = '';
    public $harga_jual = '';
    public $no_batch = '';
    public $exp_date = '';
    public $stok_awal = '';
    public $sukses = false;

    public function simpan()
    {
        $this->validate([
            'nama' => 'required|string',
            'harga_beli' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'no_batch' => 'nullable|string',
            'exp_date' => 'nullable|date',
            'stok_awal' => 'nullable|integer',
        ]);

        Obat::create([
            'nama' => $this->nama,
            'harga_beli' => $this->harga_beli,
            'harga_jual' => $this->harga_jual,
            'no_batch' => $this->no_batch,
            'exp_date' => $this->exp_date,
            'stok_awal' => $this->stok_awal,
        ]);

        $this->sukses = true;
        $this->reset(['nama', 'harga_beli', 'harga_jual', 'no_batch', 'exp_date', 'stok_awal']);
    }
};