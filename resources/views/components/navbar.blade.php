<nav
    x-data="{ open: false, scrolled: false }"
    x-init="
        scrolled = window.scrollY > 10;
        window.addEventListener('scroll', () => {scrolled = window.scrollY > 10;});"
    class="sticky top-0 z-50 flex items-center justify-between px-8 py-4">

    <div
        aria-hidden="true"
        :class="scrolled
            ? 'bg-white/3 backdrop-blur-lg border-b border-white/5'
            : 'bg-transparent backdrop-blur-none border-b border-transparent'"
        class="absolute inset-0 -z-10 transition-colors duration-300"></div>

    <a href="#home" class="flex items-center gap-4">
        <img src="icon/logo_desaingrafis.jpg" alt="Logo" class="w-8 h-8 rounded-lg">
        <h2 class="text-xl font-bold text-white">Desain Grafis</h2>
    </a>

    <!-- Menu desktop -->
    <ul class="hidden md:flex items-center gap-10 text-gray-400 font-normal md:absolute md:left-1/2 md:-translate-x-1/2">
        <li><a href="#home" class="relative py-2 transition-colors hover:text-white after:content-[''] after:absolute after:left-0 after:-bottom-0.5 after:h-0.5 after:w-full after:origin-center after:scale-x-0 after:rounded-full after:bg-linear-to-r after:from-indigo-500 after:to-violet-500 after:transition-transform after:duration-300 hover:after:scale-x-100">Home</a></li>
        <li><a href="#desain" class="relative py-2 transition-colors hover:text-white after:content-[''] after:absolute after:left-0 after:-bottom-0.5 after:h-0.5 after:w-full after:origin-center after:scale-x-0 after:rounded-full after:bg-linear-to-r after:from-indigo-500 after:to-violet-500 after:transition-transform after:duration-300 hover:after:scale-x-100">Desain</a></li>
        <li><a href="#tools" class="relative py-2 transition-colors hover:text-white after:content-[''] after:absolute after:left-0 after:-bottom-0.5 after:h-0.5 after:w-full after:origin-center after:scale-x-0 after:rounded-full after:bg-linear-to-r after:from-indigo-500 after:to-violet-500 after:transition-transform after:duration-300 hover:after:scale-x-100">Tools</a></li>
        <li><a href="#karya" class="relative py-2 transition-colors hover:text-white after:content-[''] after:absolute after:left-0 after:-bottom-0.5 after:h-0.5 after:w-full after:origin-center after:scale-x-0 after:rounded-full after:bg-linear-to-r after:from-indigo-500 after:to-violet-500 after:transition-transform after:duration-300 hover:after:scale-x-100">Karya</a></li>
    </ul>

    {{-- Mobile --}}

    <!-- Tombol hamburger (mobile) -->
    <button @click="open = !open" class="md:hidden text-white focus:outline-none">
        <svg x-show="!open" class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        <svg x-show="open" x-cloak class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    <!-- Menu mobile (dropdown) -->
    <ul
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-2"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-2"
        @click.outside="open = false"
        class="md:hidden absolute top-full left-0 w-full bg-white/3 backdrop-blur-lg border-b border-white/10 flex flex-col items-center gap-6 py-6 text-gray-300 font-normal"
    >
        <li><a href="#home" @click="open = false" class="hover:text-blue-500 transition-colors">Home</a></li>
        <li><a href="#desain" @click="open = false" class="hover:text-blue-500 transition-colors">Desain</a></li>
        <li><a href="#tools" @click="open = false" class="hover:text-blue-500 transition-colors">Tools</a></li>
        <li><a href="#karya" @click="open = false" class="hover:text-blue-500 transition-colors">Karya</a></li>
    </ul>
</nav>