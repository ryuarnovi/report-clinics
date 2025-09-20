<nav class="flex items-center justify-end space-x-2 py-2 px-4 bg-white shadow">
    @auth
        @php
            $role = Auth::user()->role ?? 'NONE';
        @endphp

        <span style="color:red; font-weight:bold;">Role: {{ $role }}</span>

        @if ($role === 'admin')
            <a href="{{ url('/admin/obat-input') }}"
               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
                Admin Panel
            </a>
        @elseif ($role === 'dokter')
            <a href="{{ url('/dokter/rekap-obat') }}"
               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
                Dokter Panel
            </a>
        @endif

        <a href="{{ url('/') }}"
           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
            Dashboard
        </a>
        <form method="POST" action="{{ url('/logout') }}" class="inline">
            @csrf
            <button type="submit"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}"
           class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
            Log in
        </a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}"
               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent hover:bg-gray-100">
                Register
            </a>
        @endif
    @endauth
</nav>


testing