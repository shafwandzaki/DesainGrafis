@extends('layout.admin')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-bold">Tools</h1>
    <a href="{{ route('admin.tools.create') }}" class="bg-white text-black font-semibold px-4 py-2 rounded-lg hover:bg-white/50">+ Tambah</a>
</div>

<div class="border border-white/10 rounded-xl shadow overflow-x-auto">
    <table class="w-full text-sm text-left">
        <thead class="bg-white/10 text-white">
            <tr>
                <th class="px-4 py-3">Icon</th>
                <th class="px-4 py-3">Nama</th>
                <th class="px-4 py-3">Kategori</th>
                <th class="px-4 py-3">Kemampuan</th>
                <th class="px-4 py-3 text-right">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white/2 backdrop-blur-lg divide-y divide-white/10">
            @forelse ($tools as $item)
                <tr>
                    <td class="px-4 py-3"><img src="{{ asset('storage/' . $item->icon_tools) }}" class="w-12 h-12 object-contain"></td>
                    <td class="px-4 py-3 font-medium">{{ $item->nama_tools }}</td>
                    <td class="px-4 py-3">{{ $item->kategori }}</td>
                    <td class="px-4 py-3 w-48">
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $item->percent }}%"></div>
                        </div>
                        <span class="text-xs text-white">{{ $item->percent }}%</span>
                    </td>
                    <td class="px-4 py-3 text-right whitespace-nowrap flex flex-col md:flex-row gap-2 justify-end items-end">

                        <a href="{{ route('admin.tools.edit', $item) }}" class="rounded-lg border border-white/20 px-3 py-1.5 transition-colors hover:bg-white/5">Edit</a>

                        <form action="{{ route('admin.tools.destroy', $item) }}" method="POST" class="inline"
                              onsubmit="return confirm('Hapus tools ini?')">
                            @csrf @method('DELETE')
                            <button class="cursor-pointer rounded-lg border border-red-500/30 px-3 py-1.5 text-red-300 transition-colors hover:bg-red-500/10">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $tools->links() }}</div>
@endsection