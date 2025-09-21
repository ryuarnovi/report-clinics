<div class="min-h-screen flex flex-col items-center justify-center">
    <div class="w-full max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <header class="flex flex-col md:flex-row items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <svg class="h-10 w-auto text-green-600" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="31" cy="32" r="30" fill="#16a34a"/>
                </svg>
                <span class="text-2xl font-bold text-gray-700">Klinik Panel</span>
            </div>

        </header>

        <main>
            <livewire:components.expiry-alert />
            <div class="grid gap-6 md:grid-cols-2">
                <a href="{{ route('dokter.rekap-obat') }}"
                   class="flex flex-col gap-2 bg-green-50 hover:bg-green-100 p-6 rounded-lg shadow ring-1 ring-green-100 transition border border-green-200">
                    <div class="flex items-center gap-2">
                        <span class="inline-block bg-green-600/10 text-green-600 p-2 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M3 3v18h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="text-lg font-semibold text-green-700">Rekap Obat</span>
                    </div>
                    <p class="text-gray-600 text-sm">Lihat laporan rekapitulasi obat: stok awal, masuk, keluar, sisa, dan laba per obat.</p>
                </a>

                <livewire:components.inventory-obat />

            <div class="mt-10">
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-6">
                    <h3 class="text-base font-bold text-gray-700 mb-2">Tips Pengelolaan Obat</h3>
                    <ul class="list-disc ml-5 text-sm text-gray-600 space-y-1">
                        <li>Selalu cek tanggal kadaluarsa dan stok minimum setiap minggu.</li>
                        <li>Input setiap transaksi masuk dan keluar obat secara real-time.</li>
                        <li>Gunakan fitur rekap untuk analisa laba dan efisiensi pembelian.</li>
                    </ul>
                </div>
            </div>
        </main>

        <footer class="mt-12 text-center text-xs text-gray-500">
            Klinik v1.0 &mdash; {{ date('Y') }} &mdash; Dibuat dengan Laravel &hearts;
        </footer>
    </div>
</div>