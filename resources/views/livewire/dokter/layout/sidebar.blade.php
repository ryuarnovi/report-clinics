<aside class="flex flex-col h-screen w-64 bg-gray-900 text-gray-100 border-r border-gray-800">
    <!-- Branding -->
    <div class="flex items-center gap-3 px-6 py-6 border-b border-gray-800">
        <div class="flex items-center justify-center h-10 w-10 bg-red-600 rounded-lg">
            <svg class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </div>
            <span class="text-xl font-bold tracking-tight"><a href="{{ route('dashboard') }}">Admin Klinik</a></span>
    </div>
    <!-- Navigation -->
    <nav class="flex-1 px-6 py-4">
        <ul class="space-y-1">
            <li>
                <a href="{{ route('dokter.rekap-obat') }}"
                    class="flex items-center px-3 py-2 rounded-md hover:bg-gray-800 transition text-sm font-medium {{ request()->routeIs('dokter.rekap-obat') ? 'bg-gray-800 text-red-400 font-bold' : '' }}">
                    <span>Rekap Obat</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Logout Button -->
    <div class="mt-auto px-6 py-6 border-t border-gray-800">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-2 px-3 py-2 rounded-md bg-red-600 text-white hover:bg-red-700 transition font-semibold justify-center">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>