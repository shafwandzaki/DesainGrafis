@extends('layout.admin')

@section('content')

    <div class="mb-8 flex items-center justify-between">
        <h1 class="font-inter text-3xl font-bold">Karya</h1>
        <a href="{{ route('admin.karya.create') }}" class="rounded-lg bg-white px-5 py-2.5 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200">
            + Tambah
        </a>
    </div>

    <div class="space-y-6">
        @forelse ($karyas as $item)
            <div class="rounded-2xl border border-white/10 p-6">
                <div class="flex flex-col gap-6 md:flex-row">

                    {{-- Gambar + tombol aksi di bawahnya --}}
                    <div class="shrink-0 md:w-72">
                        @if ($item->img_karya)
                            <img
                                src="{{ asset('storage/' . $item->img_karya) }}"
                                alt="{{ $item->nama_karya }}"
                                class="mb-4 h-44 w-full rounded-lg object-cover"
                            >
                        @else
                            <div class="mb-4 flex h-44 w-full items-center justify-center rounded-lg bg-white/5 text-xs text-gray-500">
                                Tidak ada gambar
                            </div>
                        @endif

                        <div class="flex gap-3">
                            <a
                                href="{{ route('admin.karya.edit', $item) }}"
                                class="rounded-lg bg-white px-5 py-2 font-inter text-sm font-semibold text-black transition-colors hover:bg-gray-200"
                            >
                                Edit
                            </a>
                            <form method="POST" action="{{ route('admin.karya.destroy', $item) }}" onsubmit="return confirm('Hapus karya ini?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    type="submit"
                                    class="cursor-pointer rounded-lg border border-red-500/40 px-5 py-2 font-inter text-sm font-semibold text-red-300 transition-colors hover:bg-red-500/10"
                                >
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Teks --}}
                    <div class="min-w-0">
                        <h2 class="mb-2 font-inter text-lg font-semibold">{{ $item->nama_karya }}</h2>
                        <p class="font-inter text-sm leading-relaxed text-gray-400">{{ $item->deskripsi }}</p>
                    </div>

                </div>
            </div>
        @empty
            <div class="rounded-2xl border border-white/10 p-10 text-center text-gray-500">
                Belum ada karya.
            </div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $karyas->links() }}
    </div>

@endsection