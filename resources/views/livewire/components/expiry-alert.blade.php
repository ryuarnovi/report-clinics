<div>
    @if($obatsExpSoon->count())
        @if($showToast)
            <div 
                x-data="{ show: true }"
                x-show="show"
                x-transition
                class="fixed top-6 right-6 bg-red-100 border border-red-400 text-red-800 px-6 py-4 rounded shadow-lg z-50 max-w-sm"
            >
                <div class="font-bold mb-2">Obat Akan Expired!</div>
                <ul class="list-disc ml-5 mb-3">
                    @foreach($obatsExpSoon as $obat)
                        <li>{{ $obat->nama }} (Kadaluarsa: {{ \Carbon\Carbon::parse($obat->exp_date)->format('d-m-Y') }})</li>
                    @endforeach
                </ul>
                <button 
                    class="bg-red-600 text-white px-3 py-1 rounded"
                    @click="show=false; Livewire.emit('closeToast')"
                >Tutup</button>
            </div>
        @else
            <div class="w-full max-w-3xl mx-auto mb-4">
                <div class="bg-red-50 border border-red-400 text-red-800 px-6 py-4 rounded">
                    <span class="font-bold">Info: </span>
                    Obat berikut akan expired kurang dari 30 hari:
                    <ul class="list-disc ml-5">
                        @foreach($obatsExpSoon as $obat)
                            <li>{{ $obat->nama }} (Kadaluarsa: {{ \Carbon\Carbon::parse($obat->exp_date)->format('d-m-Y') }})</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
    @endif
</div>