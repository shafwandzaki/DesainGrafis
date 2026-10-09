{{-- Variabel: $action, $item (null saat create) --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 p-6 rounded-xl shadow"
      x-data="{ preview: '{{ $item ? $item->image_url : '' }}' }">
    @csrf
    @if ($item) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium mb-1">Gambar Karya</label>
        <template x-if="preview">
            <img :src="preview" class="w-48 h-48 object-cover rounded-lg mb-2">
        </template>
        <input type="file" name="img_karya" accept="image/*"
               @change="preview = URL.createObjectURL($event.target.files[0])"
               class="block w-full text-sm">
        @if ($item) <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p> @endif
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Nama Karya</label>
        <input type="text" name="nama_karya" value="{{ old('nama_karya', $item->nama_karya ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="5" class="w-full border rounded-lg px-3 py-2">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Link Karya <span class="text-gray-400">(opsional)</span></label>
        <input type="url" name="link_karya" value="{{ old('link_karya', $item->link_karya ?? '') }}"
               class="w-full border rounded-lg px-3 py-2" placeholder="https://behance.net/...">
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800">Simpan</button>
        <a href="{{ route('admin.karya.index') }}" class="px-5 py-2 rounded-lg border">Batal</a>
    </div>
</form>