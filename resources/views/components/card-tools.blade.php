@props(['tool'])

<div class="reveal-item bg-white/5  border border-white/10 rounded-2xl p-6 flex flex-col justify-between shadow-lg shadow-black/30 backdrop-blur-lg transition duration-300 hover:-translate-y-1 hover:border-white/20 hover:bg-white/10 hover:shadow-purple-500/10 hover:text-blue-300">
    <div class="flex items-center gap-2 sm:gap-3 mb-4">
        <img src="{{ $tool['icon_tools'] }}" alt="coba" class="w-8 h-8 object-contain" />
        <p class="text-lg sm:text-xl font-semibold sm:font-bold">{{ $tool['nama_tools'] }}</p>
    </div>
    <p class="text-gray-400 text-sm mb-2">{{ $tool['kategori'] }}</p>
    <div class="flex flex-col gap-1">
        <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="bg-blue-500 h-2 rounded-full" style="width: {{ $tool['percent'] }}%"></div>
        </div>
        <p class="text-xs text-gray-300 font-medium">{{ $tool['percent'] }}%</p>
    </div>
</div>