@props(['desains'])

<div class="group cursor-pointer rounded-2xl rounded-br-[2.5rem] border border-white/10 bg-white/5 p-2.5 shadow-lg shadow-black/30 backdrop-blur-lg transition duration-300 hover:-translate-y-1 hover:border-white/20 hover:bg-white/10 hover:shadow-purple-500/10">

    {{-- Gambar --}}
    <div class="aspect-4/3 w-full overflow-hidden rounded-xl bg-white/5">
        <img
            src="{{ $desains['desain'] }}"
            alt="{{ $desains['judul'] }}"
            loading="lazy"
            class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
        >
    </div>

    {{-- Teks --}}
    <div class="px-1.5 pb-2 pt-3">
        <h3 class="truncate text-base font-semibold text-white">{{ $desains['judul'] }}</h3>
        <p class="mt-1 line-clamp-2 text-sm leading-relaxed text-gray-400">{{ $desains['deskripsi'] }}</p>
    </div>
</div>