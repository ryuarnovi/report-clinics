<!-- Form Input Data Obat - Button Merah -->
<div class="max-w-4xl w-full mx-auto bg-white p-6 rounded-lg shadow-lg">
    <form wire:submit.prevent="simpan" class="space-y-4">
        <h2 class="text-xl font-bold mb-6 text-gray-800 text-center sm:text-left">Input Data Obat</h2>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <input type="text" wire:model="nama" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Nama Obat">
            <input type="number" wire:model="harga_beli" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Harga Beli">
            <input type="number" wire:model="harga_jual" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Harga Jual">
            <input type="text" wire:model="no_batch" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="No Batch">
            <input type="date" wire:model="exp_date" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Tanggal Exp">
            <input type="number" wire:model="stok_awal" class="filament-forms-input px-4 py-3 border border-gray-200 rounded-lg focus:ring-primary-500 focus:border-primary-500 w-full" placeholder="Stok Awal">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                Simpan
            </button>
        </div>

        @if($sukses)
            <div class="mt-4 text-success-700 font-semibold text-center">
                Obat berhasil disimpan!
            </div>
        @endif
    </form>
</div>