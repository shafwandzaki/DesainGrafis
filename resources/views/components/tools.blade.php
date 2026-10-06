@props (['tools'])

<section id="tools" class="min-h-screen py-16 px-4 font-sans text-white mb-32">
    <div class="max-w-6xl mx-auto mt-14">
        <!-- Judul -->
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-4">Tools</h1>
        <p class="font-inter text-gray-400 text-center mb-16">Berikut ini adalah bebrapa tools yang saya gunakan untuk mengedit karya fotografi saya</p>

        <!-- Grid Container (4 Kolom) -->
        <div class="reveal-group grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-4 gap-3 sm:gap-4 md:gap-6 lg:gap-6">
            @foreach ($tools as $tool)
                <x-card-tools :tool="$tool"/>
            @endforeach
        </div>
    </div>
</section>