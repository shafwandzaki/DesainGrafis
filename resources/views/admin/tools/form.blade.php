@php
    $tool = $tool ?? null;
@endphp

<div class="space-y-4" x-data="{ percent: {{ old('percent', $tool->percent ?? 50) }} }">

    <div>
        <label for="icon_tools" class="mb-1 block font-inter text-sm text-gray-300">
            Icon Tools {{ $tool ? '(kosongkan kalau tidak ingin mengganti)' : '' }}
        </label>

        @if ($tool?->icon_tools)
        <div class="mb-3 flex h-40 w-40 items-center justify-center overflow-hidden rounded-lg bg-white/5">
            <img src="{{ asset('storage/' . $tool->icon_tools) }}" alt="{{ $tool->nama_tools }}" class="h-full w-full object-contain">
        </div>
        @endif

        <input
            id="icon_tools"
            type="file"
            name="icon_tools"
            accept="image/*"
            class="w-full rounded-lg border border-white/10 bg-white/5 backdrop-blur-lg px-4 py-2.5 font-inter text-sm text-white file:mr-4 file:rounded file:border-0 file:bg-white/10 file:px-3 file:py-1.5 file:text-white"
        >
        @error('icon_tools') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Nama Tools</label>
        <input type="text" name="nama_tools" value="{{ old('nama_tools', $tool->nama_tools ?? '') }}"
               class="w-full border border-white/10 bg-white/3 backdrop-blur-lg rounded-lg px-3 py-2" placeholder="Adobe Photoshop">
        @error('nama_tools') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Kategori</label>
        <input type="text" name="kategori" list="kategori-list"
               value="{{ old('kategori', $tool->kategori ?? '') }}"
               class="w-full border border-white/10 bg-white/3 backdrop-blur-lg rounded-lg px-3 py-2" placeholder="Desain / Editing / Lainnya">
        <datalist id="kategori-list">
            <option value="Desain">
            <option value="Editing">
            <option value="Lainnya">
        </datalist>
        @error('kategori') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-inter mb-1">Tingkat Kemampuan: <span x-text="percent + '%'"></span></label>
        <input type="range" name="percent" min="0" max="100" x-model="percent" class="w-full">
        @error('percent') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="flex gap-3">
        <button type="submit" class="cursor-pointer bg-white text-black font-bold px-5 py-2 rounded-lg hover:bg-white/50">Simpan</button>
        <a href="{{ route('admin.tools.index') }}" class="px-5 py-2 rounded-lg border border-white/10 bg-white/3 backdrop-blur-lg hover:bg-white/10">Batal</a>
    </div>
</div>