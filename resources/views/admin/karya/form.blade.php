@php
    $karya = $karya ?? null;
@endphp

<div class="space-y-4">

    <div>
        <label for="img_karya" class="mb-1 block font-inter text-sm text-gray-300">
            Gambar Karya {{ $karya ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($karya?->img_karya)
        <div class="mb-3 flex h-40 w-60 items-center justify-center overflow-hidden rounded-lg bg-white/5">
            <img src="{{ asset('storage/' . $karya->img_karya) }}" alt="{{ $karya->nama_karya }}" class="h-full w-full object-contain">
        </div>
        @endif

        <input
            id="img_karya"
            type="file"
            name="img_karya"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-white/3 backdrop-blur-lg px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
        @error('img_karya') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Nama Karya</label>
        <input type="text" name="nama_karya" value="{{ old('nama_karya', $karya->nama_karya ?? '') }}"
               class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg">
        @error('nama_karya') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="5" class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg">{{ old('deskripsi', $karya->deskripsi ?? '') }}</textarea>
        @error('deskripsi') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Link Karya <span class="text-gray-400">(opsional)</span></label>
        <input type="url" name="link_karya" value="{{ old('link_karya', $karya->link_karya ?? '') }}"
               class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg" placeholder="https://karya.com/...">
        @error('link_karya') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="cursor-pointer bg-white text-black font-bold px-5 py-2 rounded-lg hover:bg-white/50">Simpan</button>
        <a href="{{ route('admin.karya.index') }}" class="px-5 py-2 rounded-lg border border-white/10 bg-white/3 backdrop-blur-lg hover:bg-white/10">Batal</a>
    </div>
</div>