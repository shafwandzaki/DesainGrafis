@props (['desain'])

<section id="desain" class="min-h-screen py-16 px-4 font-inter text-white mb-32">
    <div class="max-w-6xl mx-auto mt-14">
        <!-- Judul -->
        <h1 class="text-4xl md:text-5xl font-bold text-center mb-4">Desain</h1>
        <p class="text-gray-400 text-center mb-16">Berikut ini adalah beberapa desain yang telah saya buat</p>

        <!-- Grid Container (4 Kolom) -->
        <div class="reveal-group grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-2 sm:gap-4 md:gap-6">
            @foreach ($desain as $desains)
                <x-card-desain :desains="$desains"/>
            @endforeach
        </div>
    </div>
</section>