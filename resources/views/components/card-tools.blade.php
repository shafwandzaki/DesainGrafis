@props(['tool'])

<div class="reveal-item bg-white/5  border border-white/10 rounded-2xl p-6 flex flex-col justify-between shadow-lg hover:text-blue-300 transition-all duration-300">
    <div class="flex items-center gap-2 sm:gap-3 mb-4">
        <img src="{{ $tool['icon_tools'] }}" alt="coba" class="w-8 h-8 object-contain" />
        <p class="text-lg sm:text-xl font-semibold sm:font-bold">{{ $tool['nama_tools'] }}</p>
    </div>
    <p class="text-gray-400 text-sm mb-2">{{ $tool['kategori'] }}</p>
    <p class="text-xs text-gray-300 flex items-center gap-2 font-medium">
        <span class="w-2 h-2 rounded-full bg-white inline-block"></span>
        {{ $tool['percent'] }}%
    </p>
</div>