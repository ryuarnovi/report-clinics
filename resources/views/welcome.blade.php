<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Klinik Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased font-sans bg-gray-50">
        <div class="min-h-screen flex flex-col items-center justify-center">
            <div class="w-full max-w-3xl mx-auto bg-white p-8 rounded-lg shadow-lg">
                <header class="flex flex-col md:flex-row items-center justify-between mb-6">
                    <div class="flex items-center gap-3">
                        <svg class="h-10 w-auto text-green-600" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="31" cy="32" r="30" fill="#16a34a"/>
                        </svg>
                        <span class="text-2xl font-bold text-gray-700">Klinik Panel</span>
                    </div>
                    <div class="mt-4 md:mt-0 flex gap-2">
                        @auth
                            <span class="text-gray-600">Welcome, <b>{{ Auth::user()->name }}</b>!</span>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="ml-4 bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">Logout</button>
                            </form>
                        @endauth
                    </div>
                </header>

                <main>
                    <div class="grid gap-6 md:grid-cols-2">
                        <a href="{{ route('obat.rekap') }}"
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

                        <a href="{{ route('obat.inventory') }}"
                           class="flex flex-col gap-2 bg-blue-50 hover:bg-blue-100 p-6 rounded-lg shadow ring-1 ring-blue-100 transition border border-blue-200">
                            <div class="flex items-center gap-2">
                                <span class="inline-block bg-blue-600/10 text-blue-600 p-2 rounded-full">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <rect x="3" y="4" width="18" height="16" rx="2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M3 10h18" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </span>
                                <span class="text-lg font-semibold text-blue-700">Inventory Obat</span>
                            </div>
                            <p class="text-gray-600 text-sm">Kelola data stok obat, update jumlah, tambah stok baru, dan monitoring inventory.</p>
                        </a>
                    </div>

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
    </body>
</html>