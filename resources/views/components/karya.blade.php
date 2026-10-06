@props(['karya'])

<section id="karya" x-data="{ selected: null }" class="min-h-screen py-16 px-4 font-sans text-white mb-32">
    <!-- Wrapper Utama -->
    <div class="max-w-6xl mx-auto mt-18">
        
        <!-- Judul Utama -->
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-4">Karya</h1>
        <p class="mx-auto mb-12 max-w-md text-center font-inter text-sm text-gray-400 sm:mb-16 sm:text-base">
            Berikut ini adalah beberapa karya saya yang lainnya</p>
        
        <!-- Baris Column -->
        <div class="reveal-group grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            @foreach ($karya as $karyas)
                <x-card-karya :karyas="$karyas" />
            @endforeach
            
        </div>
        <x-modal-card-karya/>
    </div>
</section>