<!-- Form Input Barang Keluar - Filament Panel Style (Red Button) -->
<div class="max-w-4xl w-full mx-auto bg-white p-6 rounded-lg shadow-lg">
    <form wire:submit.prevent="simpan" class="space-y-6">
        <h2 class="text-xl font-bold text-gray-800 mb-6 text-center sm:text-left">Input Barang Keluar</h2>
        
        <div>
            <label for="obat_id" class="block text-sm font-medium text-gray-700 mb-2">Pilih Obat</label>
            <select wire:model="obat_id" id="obat_id"
                class="filament-forms-select w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 transition-all duration-150">
                <option value="">-- Pilih Obat --</option>
                @foreach($obats as $obat)
                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                @endforeach
            </select>
            @error('obat_id')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        
        <div>
            <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-2">Jumlah Keluar</label>
            <input type="number" wire:model="jumlah" id="jumlah"
                class="filament-forms-input w-full px-4 py-3 border border-gray-200 rounded-lg bg-gray-50 focus:ring-red-500 focus:border-red-500 transition-all duration-150"
                placeholder="Jumlah Keluar" min="1">
            @error('jumlah')
                <span class="text-xs text-red-600 mt-1 block">{{ $message }}</span>
            @enderror
        </div>
        
        <div class="flex justify-end">
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                Simpan
            </button>
        </div>
        
        @if($sukses)
            <div class="mt-4 text-center text-red-700 font-semibold animate-pulse">
                Barang keluar berhasil dicatat!
            </div>
        @endif
    </form>
</div>