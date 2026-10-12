@props(['desains'])

{{-- Dipindah ke <body> supaya position:fixed tidak terpengaruh efek blur/transform milik kartu --}}
<template x-teleport="body">
    <div
        x-show="open"
        x-cloak
        @keydown.escape.window="open = false"
        @click.self="open = false"
        role="dialog"
        aria-modal="true"
        class="fixed inset-0 z-100 flex items-center justify-center p-4 backdrop-blur-sm"
    >
        <div class="flex max-h-[90vh] w-full max-w-6xl flex-col overflow-hidden rounded-2xl border border-white/10 md:h-[80vh] md:max-h-144 md:flex-row">

            {{-- Gambar --}}
            <div class="flex min-h-0 flex-1 items-center justify-center bg-black">
                <img src="{{ $desains['desain'] }}" alt="{{ $desains['judul'] }}" class="max-h-[30vh] w-full object-contain md:h-full md:max-h-full">
            </div>

            {{-- Teks --}}
            <div class="relative flex w-full shrink-0 flex-col overflow-y-auto bg-black/70 backdrop-blur-2xl p-6 md:w-96">

                <button
                    type="button"
                    @click="open = false"
                    aria-label="Tutup"
                    class="cursor-pointer absolute right-4 top-4 flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white hover:bg-white/20"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" class="h-4 w-4">
                        <path d="M6 6l12 12M18 6L6 18" />
                    </svg>
                </button>

                <h2 class="pr-12 font-syne text-2xl font-bold leading-tight text-white">{{ $desains['judul'] }}</h2>

                @if ($desains['deskripsi'])
                    <p class="mt-3 font-inter text-sm leading-relaxed text-gray-300">{{ $desains['deskripsi'] }}</p>
                @endif
            </div>
        </div>
    </div>
</template>