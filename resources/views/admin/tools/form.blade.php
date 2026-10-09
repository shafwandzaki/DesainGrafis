{{-- Variabel: $action, $item (null saat create) --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 p-6 rounded-xl shadow"
      x-data="{ preview: '{{ $item ? $item->icon_url : '' }}', percent: {{ old('percent', $item->percent ?? 50) }} }">
    @csrf
    @if ($item) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium mb-1">Icon Tools</label>
        <template x-if="preview">
            <img :src="preview" class="w-20 h-20 object-contain mb-2">
        </template>
        <input type="file" name="icon_tools" accept="image/*"
               @change="preview = URL.createObjectURL($event.target.files[0])"
               class="block w-full text-sm">
        @if ($item) <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti icon.</p> @endif
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Nama Tools</label>
        <input type="text" name="nama_tools" value="{{ old('nama_tools', $item->nama_tools ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" placeholder="Adobe Photoshop">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Kategori</label>
        <input type="text" name="kategori" list="kategori-list"
               value="{{ old('kategori', $item->kategori ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" placeholder="Desain / Editing / Lainnya">
        <datalist id="kategori-list">
            <option value="Desain">
            <option value="Editing">
            <option value="Lainnya">
        </datalist>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Tingkat Kemampuan: <span x-text="percent + '%'"></span></label>
        <input type="range" name="percent" min="0" max="100" x-model="percent" class="w-full">
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800">Simpan</button>
        <a href="{{ route('admin.tools.index') }}" class="px-5 py-2 rounded-lg border">Batal</a>
    </div>
</form>