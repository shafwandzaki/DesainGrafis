@extends('layout.admin')

@section('content')
<div class="max-w-2xl font-inter">
    <h1 class="text-2xl font-bold mb-6">Edit Konten Home</h1>

    <form action="{{ route('admin.home.update') }}" method="POST" class="space-y-4 rounded-xl shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium mb-1">Title (Nama)</label>
            <input type="text" name="title" value="{{ old('title', $home->title) }}"
                   class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $home->tagline) }}"
                   class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="deskripsi" rows="5"
                      class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg">{{ old('deskripsi', $home->deskripsi) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Link LinkedIn</label>
            <input type="url" name="link_linkedin" value="{{ old('link_linkedin', $home->link_linkedin) }}"
                   class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg" placeholder="https://linkedin.com/in/username">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="link_email" value="{{ old('link_email', $home->link_email) }}"
                   class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg" placeholder="nama@email.com">
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Link Instagram</label>
            <input type="url" name="link_instagram" value="{{ old('link_instagram', $home->link_instagram) }}"
                   class="w-full border border-white/10 rounded-lg px-3 py-2 bg-white/3 backdrop-blur-lg" placeholder="https://instagram.com/username">
        </div>

        <button type="submit" class="cursor-pointer bg-white text-black font-bold px-5 py-2 rounded-lg hover:bg-white/50">Simpan</button>
    </form>
</div>
@endsection