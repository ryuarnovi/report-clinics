<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Obat;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapObat extends Component
{
    public $search = '';
    public $searchQuery = '';

    public function mount()
    {
        // Optional: membatasi akses hanya untuk admin
        if(auth()->user()->role !== 'admin'){ abort(403); }
    }

    public function submitSearch()
    {
        // Proses pencarian hanya saat tombol Search diklik atau Enter
        $this->searchQuery = $this->search;
    }

    public function render()
    {
        $obats = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })
            ->get();

        return view('livewire.admin.rekap-obat', compact('obats'))
            ->layout('livewire.admin.layout.admin');
    }

    // Export CSV hanya kolom yang admin lihat
    public function downloadCSV()
    {
        $csvData = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })
            ->get()
            ->map(function ($obat) {
                return [
                    'Nama' => $obat->nama,
                    'Harga Beli' => $obat->harga_beli,
                    'Harga Jual' => $obat->harga_jual,
                    'No Batch' => $obat->no_batch,
                    'Exp Date' => $obat->exp_date,
                    'Stok Awal' => $obat->stok_awal,
                    'Masuk' => $obat->stok_awal + ($obat->jumlah_masuk ?? 0),
                    'Keluar' => $obat->jumlah_keluar ?? 0,
                    'Sisa' => $obat->sisa_stok ?? 0,
                    'Laba' => $obat->laba ?? 0,
                ];
            });

        $csvFileName = 'rekap_obat_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName",
        ];

        return response()->stream(function () use ($csvData) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, array_keys($csvData->first() ?: [
                'Nama', 'Harga Jual', 'Harga Beli', 'No Batch', 'Exp Date', 'Stok Awal', 'Masuk', 'Keluar', 'Sisa', 'Laba'
            ]));
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 200, $headers);
    }

    // Export PDF hanya kolom yang admin lihat
    public function downloadPDF()
    {
        $pdfData = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })
            ->get();

        $pdf = Pdf::loadView('pdf.admin-rekap-obat', ['obats' => $pdfData]);
        return $pdf->download('rekap_obat_' . now()->format('Ymd_His') . '.pdf');
    }
}