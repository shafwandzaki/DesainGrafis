{{-- Variabel: $action, $item (null saat create) --}}
<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
      class="space-y-4 bg-white p-6 rounded-xl shadow"
      x-data="{ preview: '{{ $item ? $item->image_url : '' }}' }">
    @csrf
    @if ($item) @method('PUT') @endif

    <div>
        <label class="block text-sm font-medium mb-1">Gambar Desain</label>
        <template x-if="preview">
            <img :src="preview" class="w-48 h-48 object-cover rounded-lg mb-2">
        </template>
        <input type="file" name="desain" accept="image/*"
               @change="preview = URL.createObjectURL($event.target.files[0])"
               class="block w-full text-sm">
        @if ($item) <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar.</p> @endif
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Judul</label>
        <input type="text" name="judul" value="{{ old('judul', $item->judul ?? '') }}"
               class="w-full border rounded-lg px-3 py-2">
    </div>

    <div>
        <label class="block text-sm font-medium mb-1">Deskripsi</label>
        <textarea name="deskripsi" rows="5" class="w-full border rounded-lg px-3 py-2">{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800">Simpan</button>
        <a href="{{ route('admin.desain.index') }}" class="px-5 py-2 rounded-lg border">Batal</a>
    </div>
</form>