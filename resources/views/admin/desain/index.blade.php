@extends('layout.admin')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Desain</h1>
        <a href="{{ route('admin.desain.create') }}" class="bg-white text-black font-semibold px-4 py-2 rounded-lg hover:bg-white/50">+ Tambah</a>
    </div>

    @include('admin.partials.alert')

    <div class="border border-white/10 rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm text-left">
            <thead class="bg-white/5 text-white">
                <tr>
                    <th class="px-4 py-3">Gambar</th>
                    <th class="px-4 py-3">Judul</th>
                    <th class="px-4 py-3">Deskripsi</th>
                    <th class="px-4 py-3 text-right">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($desains as $item)
                    <tr>
                        <td class="px-4 py-3"><img src="{{ asset('storage/' . $item->desain) }}" class="w-20 h-20 object-cover rounded-lg"></td>
                        <td class="px-4 py-3 font-medium">{{ $item->judul }}</td>
                        <td class="px-4 py-3 text-gray-600">{{ \Illuminate\Support\Str::limit($item->deskripsi, 40) }}</td>
                        <td class="px-4 py-3 text-right whitespace-nowrap">
                            <a href="{{ route('admin.desain.edit', $item) }}" class="rounded-lg border border-white/10 px-3 py-1.5 transition-colors hover:bg-white/5">Edit</a>
                            <form action="{{ route('admin.desain.destroy', $item) }}" method="POST" class="inline"
                                onsubmit="return confirm('Hapus desain ini?')">
                                @csrf @method('DELETE')
                                <button class="rounded-lg border border-red-500/30 px-3 py-1.5 text-red-300 transition-colors hover:bg-red-500/10">Hapus</button>
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