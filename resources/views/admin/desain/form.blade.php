@php
    $desain = $desain ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="desain" class="mb-1 block font-inter text-sm text-gray-300">
            Gambar Desain {{ $desain ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($desain?->desain)
        <div class="mb-3 flex h-40 w-60 items-center justify-center overflow-hidden rounded-lg bg-white/5">
            <img src="{{ asset('storage/' . $desain->desain) }}" alt="{{ $desain->judul }}" class="h-full w-full object-contain">
        </div>
        @endif

        <input
            id="desain"
            type="file"
            name="desain"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-white/3 backdrop-blur-lg px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
        @error('desain') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $desain->judul ?? '') }}" placeholder="Masukkan Judul..."
               class="w-full border border-white/10 bg-white/3 backdrop-blur-lg rounded-lg px-3 py-2">
        @error('judul') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="5" class="w-full border border-white/10 bg-white/3 backdrop-blur-lg rounded-lg px-3 py-2">{{ old('deskripsi', $desain->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="cursor-pointer bg-white text-black font-bold px-5 py-2 rounded-lg hover:bg-white/50">Simpan</button>
        <a href="{{ route('admin.desain.index') }}" class="px-5 py-2 rounded-lg border border-white/10 bg-white/3 backdrop-blur-lg hover:bg-white/10">Batal</a>
    </div>
</div>