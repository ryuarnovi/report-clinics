<!-- Filament Admin Panel Table for "Rekap Obat" with Tailwind CSS styling -->
<div class="overflow-x-auto bg-white p-6 rounded-lg shadow-lg max-w-4xl w-full mx-auto">
    <h2 class="text-xl font-bold mb-6 text-gray-800 text-center sm:text-left">Rekap Obat</h2>
    <table class="min-w-full border border-gray-200 bg-white rounded-lg overflow-hidden text-sm filament-tables-table">
        <thead>
            <tr class="bg-primary-100">
                <th class="px-4 py-3 border-b text-left font-semibold text-primary-700">Nama</th>
                <th class="px-4 py-3 border-b text-right font-semibold text-primary-700">Harga Jual</th>
                <th class="px-4 py-3 border-b text-left font-semibold text-primary-700">No Batch</th>
                <th class="px-4 py-3 border-b text-center font-semibold text-primary-700">Exp Date</th>
                <th class="px-4 py-3 border-b text-right font-semibold text-primary-700">Stok Awal</th>
                <th class="px-4 py-3 border-b text-right font-semibold text-primary-700">Masuk</th>
                <th class="px-4 py-3 border-b text-right font-semibold text-primary-700">Keluar</th>
                <th class="px-4 py-3 border-b text-right font-semibold text-primary-700">Sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($obats as $obat)
            <tr class="hover:bg-primary-50 transition-colors">
                <td class="px-4 py-3 border-b">{{ $obat->nama }}</td>
                <td class="px-4 py-3 border-b text-right">{{ number_format($obat->harga_jual) }}</td>
                <td class="px-4 py-3 border-b">{{ $obat->no_batch }}</td>
                <td class="px-4 py-3 border-b text-center">{{ $obat->exp_date }}</td>
                <td class="px-4 py-3 border-b text-right">{{ $obat->stok_awal }}</td>
                <td class="px-4 py-3 border-b text-right">{{ $obat->jumlah_masuk }}</td>
                <td class="px-4 py-3 border-b text-right">{{ $obat->jumlah_keluar }}</td>
                <td class="px-4 py-3 border-b text-right font-bold text-success-700">{{ $obat->sisa_stok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- 
Notes:
- Colors "primary-100", "primary-700", "primary-50", and "success-700" use Filament's Tailwind color tokens for panel consistency.
- px-4/py-3 gives more breathing room for admin tables.
- hover:bg-primary-50 for nice row highlighting.
- You can further customize Filament's panel theme in filament.php config or override Tailwind config if needed.
-->