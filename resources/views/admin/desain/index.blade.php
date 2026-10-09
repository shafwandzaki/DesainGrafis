@extends('layout.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Desain</h1>
    <a href="{{ route('admin.desain.create') }}" class="bg-black text-white px-4 py-2 rounded-lg hover:bg-gray-800">+ Tambah</a>
</div>

@include('admin.partials.alert')

<div class="bg-white rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-gray-100 text-gray-600">
            <tr>
                <th class="px-4 py-3">Gambar</th>
                <th class="px-4 py-3">Judul</th>
                <th class="px-4 py-3">Deskripsi</th>
                <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($desains as $item)
                <tr class="border-t">
                    <td class="px-4 py-3"><img src="{{ $item->image_url }}" class="w-20 h-20 object-cover rounded-lg"></td>
                    <td class="px-4 py-3 font-medium">{{ $item->judul }}</td>
                    <td class="px-4 py-3 text-gray-600">{{ \Illuminate\Support\Str::limit($item->deskripsi, 80) }}</td>
                    <td class="px-4 py-3 text-right whitespace-nowrap">
                        <a href="{{ route('admin.desain.edit', $item) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.desain.destroy', $item) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus desain ini?')">
                            @csrf @method('DELETE')
                            <button class="text-red-600 hover:underline ml-3">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4" class="px-4 py-8 text-center text-gray-500">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $desains->links() }}</div>
@endsection