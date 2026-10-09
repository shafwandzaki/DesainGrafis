@props(['home'])

<section id="home" class="scroll-mt-18 flex min-h-screen flex-col justify-center px-8 py-20 md:px-16">

  {{-- Title --}}
  <div class="mb-6 flex items-center gap-3">
    <span class="h-2 w-2 rounded-full bg-white"></span>
    <p class="text-xs uppercase tracking-[0.2em] text-gray-400 md:text-sm">
      {{ $home['title'] }}
    </p>
  </div>

  {{-- Judul --}}
  <h1 class="mb-8 max-w-5xl text-3xl font-bold leading-[1.05] tracking-tight lg:text-[5.5rem]">
    {{ $home['tagline'] }}
  </h1>

  {{-- Deskripsi --}}
  <p class="mb-12 max-w-4xl text-lg leading-relaxed text-gray-300 md:text-xl">
    {{ $home['deskripsi'] }}
  </p>

  {{-- Tombol --}}
  <div class="mb-8 flex flex-wrap items-center gap-8">
    <button class="rounded-xl bg-white px-8 py-2 text-lg font-semibold text-black transition-colors hover:bg-white/70">
      <a href="https://potofoliodzaki.infinityfreeapp.com" target="_blank" rel="noopener noreferrer">Portofolio</a>
    </button>
    <button class="rounded-xl border border-white/20 bg-white/10 px-8 py-2 text-lg font-semibold transition-colors hover:bg-white/30">
      <a href="#karya">Karya</a>
    </button>
  </div>

  <!-- Social Media Icons -->
  <div class="flex items-center gap-4">
    <!-- LinkedIn -->
    <a href="{{ $home['link_linkedin'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-600/50 text-white hover:border-white hover:text-white transition-colors">
      <x-svg-linkedin></x-linkedin>
    </a>
    <!-- Email -->
    <a href="mailto:{{ $home['link_email'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-600/50 text-white hover:border-white hover:text-white transition-colors">
      <x-svg-email></x-email>
    </a>
    <!-- Instagram -->
    <a href="{{ $home['link_instagram'] }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-12 h-12 rounded-full border border-gray-600/50 text-white hover:border-white hover:text-white transition-colors">
      <x-svg-instagram></x-instagram>
    </a>
  </div>

</section>