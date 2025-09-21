<?php

namespace App\Livewire\Dokter;

use Livewire\Component;
use App\Models\Obat;
use Illuminate\Support\Facades\Response;

class RekapObatExport extends Component
{
    public function exportCsv()
    {
        $obats = Obat::all();
        $csvFileName = 'rekap_obat_' . now()->format('Ymd_His') . '.csv';
        $headers = [
            "Content-type" => "text/csv; charset=UTF-8",
            "Content-Disposition" => "attachment; filename=$csvFileName",
        ];

        $callback = function() use ($obats) {
            $handle = fopen('php://output', 'w');
            // Tulis BOM agar Excel deteksi UTF-8
            fwrite($handle, "\xEF\xBB\xBF");

            $first = [
                'Nama', 'Harga Beli', 'Harga Jual', 'No Batch', 'Exp Date',
                'Stok Awal', 'Masuk', 'Keluar', 'Sisa', 'Laba'
            ];
            fputcsv($handle, $first);

            foreach ($obats as $obat) {
                $row = [
                    mb_convert_encoding($obat->nama, 'UTF-8'),
                    $obat->harga_beli,
                    $obat->harga_jual,
                    mb_convert_encoding($obat->no_batch, 'UTF-8'),
                    $obat->exp_date,
                    $obat->stok_awal,
                    $obat->jumlah_masuk ?? 0,
                    $obat->jumlah_keluar ?? 0,
                    $obat->sisa_stok ?? 0,
                    $obat->laba ?? 0,
                ];
                fputcsv($handle, $row);
            }
            fclose($handle);
        };

        return Response::stream($callback, 200, $headers);
    }
    public function exportPdf()
    {
        $obats = \App\Models\Obat::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.rekap-obat', ['obats' => $obats]);
        return $pdf->download('rekap_obat_' . now()->format('Ymd_His') . '.pdf');
    }

    public function render()
    {
        // Tidak perlu tampilan khusus, ini hanya untuk endpoint GET
        return '';
    }
}