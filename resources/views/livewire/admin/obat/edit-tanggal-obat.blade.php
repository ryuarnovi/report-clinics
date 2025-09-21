<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <form wire:submit.prevent="simpan">
        <h2 class="text-lg font-bold mb-4">Ubah Tanggal Produksi & Expired</h2>
        <input type="text" class="w-full mb-2 p-2 border rounded" value="{{ $obat->nama }}" disabled>
        <input type="date" wire:model="tanggal_produksi" class="w-full mb-2 p-2 border rounded">
        <input type="date" wire:model="exp_date" class="w-full mb-2 p-2 border rounded">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
        @if(session()->has('success'))
            <div class="mt-2 text-green-700">{{ session('success') }}</div>
        @endif
        @error('tanggal_produksi')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        @error('exp_date')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
    </form>
</div>