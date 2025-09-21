<?php

namespace App\Livewire\Dokter;

use Livewire\Component;
use App\Models\Obat;
use Barryvdh\DomPDF\Facade\Pdf;

class RekapObat extends Component
{
    public $search = '';
    public $searchQuery = '';

    public function mount()
    {
        // Cek hak akses dokter, boleh!
        if(auth()->user()->role !== 'dokter' && auth()->user()->role !== 'admin'){ abort(403); }
    }

    public function submitSearch()
    {
        $this->searchQuery = $this->search;
    }

    public function render()
    {
        $obats = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })
            ->get();

        return view('livewire.dokter.rekap-obat', compact('obats'))
            ->layout('livewire.dokter.layout.dokter');
    }

    // Export CSV hanya kolom dokter
    public function downloadCSV()
    {
        $csvData = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })->get()
            ->map(function ($obat) {
                return [
                    'Nama' => $obat->nama,
                    'No Batch' => $obat->no_batch,
                    'Exp Date' => $obat->exp_date,
                    'Stok Awal' => $obat->stok_awal,
                    'Sisa' => $obat->sisa_stok ?? 0,
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
                'Nama', 'No Batch', 'Exp Date', 'Stok Awal', 'Sisa'
            ]));
            foreach ($csvData as $row) {
                fputcsv($handle, $row);
            }
            fclose($handle);
        }, 200, $headers);
    }

    public function downloadPDF()
    {
        $pdfData = Obat::query()
            ->when($this->searchQuery, function ($q) {
                $q->where('nama', 'like', '%'.$this->searchQuery.'%');
            })
            ->get();

        $pdf = Pdf::loadView('pdf.dokter-rekap-obat', ['obats' => $pdfData]);
        return $pdf->download('rekap_obat_' . now()->format('Ymd_His') . '.pdf');
    }
}