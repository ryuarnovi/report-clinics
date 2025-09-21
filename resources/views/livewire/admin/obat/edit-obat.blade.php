@php
    use App\Models\Obat;
    $obat = Obat::findOrFail($id);
@endphp

<x-volt-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Obat
        </h2>
        <livewire:edit-tanggal-obat :obat="$obat" />
    </x-slot>

    <div class="max-w-md mx-auto bg-white p-6 rounded shadow mt-6">
        <form wire:submit.prevent="updateObat">
            <input type="hidden" wire:model="obat.id">
            <input type="text" wire:model="nama" class="w-full mb-2 p-2 border rounded" placeholder="Nama Obat">
            @error('nama') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="number" wire:model="harga_beli" class="w-full mb-2 p-2 border rounded" placeholder="Harga Beli">
            @error('harga_beli') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="number" wire:model="harga_jual" class="w-full mb-2 p-2 border rounded" placeholder="Harga Jual">
            @error('harga_jual') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="text" wire:model="no_batch" class="w-full mb-2 p-2 border rounded" placeholder="No Batch">
            @error('no_batch') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="date" wire:model="tanggal_produksi" class="w-full mb-2 p-2 border rounded" placeholder="Tanggal Produksi">
            @error('tanggal_produksi') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="date" wire:model="exp_date" class="w-full mb-2 p-2 border rounded" placeholder="Tanggal Exp">
            @error('exp_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <input type="number" wire:model="stok_awal" class="w-full mb-2 p-2 border rounded" placeholder="Stok Awal">
            @error('stok_awal') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            @if(session()->has('success'))
                <div class="mt-2 text-green-700">{{ session('success') }}</div>
            @endif
        </form>
    </div>
</x-volt-layout>