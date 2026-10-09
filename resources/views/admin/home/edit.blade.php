@extends('layout.admin')

@section('content')
<div class="max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Konten Home</h1>

    @include('admin.partials.alert')

    <form action="{{ route('admin.home.update') }}" method="POST" class="space-y-4 p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Title (Nama)</label>
            <input type="text" name="title" value="{{ old('title', $home->title) }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $home->tagline) }}"
                   class="w-full border rounded-lg px-3 py-2">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="5"
                      class="w-full border rounded-lg px-3 py-2">{{ old('deskripsi', $home->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Link LinkedIn</label>
            <input type="url" name="link_linkedin" value="{{ old('link_linkedin', $home->link_linkedin) }}"
                   class="w-full border rounded-lg px-3 py-2" placeholder="https://linkedin.com/in/username">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="link_email" value="{{ old('link_email', $home->link_email) }}"
                   class="w-full border rounded-lg px-3 py-2" placeholder="nama@email.com">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Link Instagram</label>
            <input type="url" name="link_instagram" value="{{ old('link_instagram', $home->link_instagram) }}"
                   class="w-full border rounded-lg px-3 py-2" placeholder="https://instagram.com/username">
        </div>

        <button type="submit" class="bg-black text-white px-5 py-2 rounded-lg hover:bg-gray-800">Simpan</button>
    </form>
</div>
@endsection