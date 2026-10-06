{{-- resources/views/components/background.blade.php --}}
{{-- Pemakaian: <x-background /> tepat setelah <body>. Tidak butuh Alpine maupun Tailwind. --}}

<div class="bgx-root" aria-hidden="true">
    {{-- Grid --}}
    <div class="bgx-grid"></div>

    {{-- Glow gradasi --}}
    <div class="bgx-blob bgx-blob--purple"></div>
    <div class="bgx-blob bgx-blob--blue"></div>
    <div class="bgx-blob bgx-blob--fuchsia"></div>

    {{-- Bentuk abstrak 1 (kanan atas) --}}
    <svg class="bgx-shape" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
        <path fill="currentColor" d="M44.7,-76.4C58.9,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,89.1,-0.5C88.1,15.2,83.6,30.5,75.2,43.3C66.8,56.1,54.5,66.6,40.6,73.6C26.7,80.7,11.3,84.4,-3.8,81.1C-18.9,77.9,-33.7,67.7,-46.8,57.1C-60,46.4,-71.5,35.2,-78.9,21.3C-86.3,7.5,-89.6,-8.9,-85.7,-23.4C-81.8,-37.8,-70.7,-50.2,-57.8,-57.9C-44.9,-65.6,-30.2,-68.6,-16.1,-69.1C-2.1,-69.6,11.3,-67.7,24.1,-63.9C36.8,-60,49,-54.3,44.7,-76.4Z" transform="translate(100 100)" />
    </svg>

    {{-- Bentuk abstrak 2 (kiri bawah): dua sel sedang membelah --}}
    <svg class="bgx-shape bgx-shape--2" viewBox="0 0 260 200" xmlns="http://www.w3.org/2000/svg">
        <defs>
            {{-- Efek "goo" supaya dua sel menyatu dengan leher yang melar saat membelah --}}
            <filter id="bgx-goo" x="-20%" y="-20%" width="140%" height="140%">
                <feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 22 -10" />
            </filter>
        </defs>

        {{-- Badan sel: besar + kecil --}}
        <g filter="url(#bgx-goo)">
            <circle class="bgx-cell bgx-cell--big"   cx="85"  cy="100" r="62" fill="currentColor" />
            <circle class="bgx-cell bgx-cell--small" cx="175" cy="100" r="38" fill="currentColor" />
        </g>

        {{-- Inti sel --}}
        <circle class="bgx-cell bgx-cell--big"   cx="85"  cy="100" r="18" fill="#0B0D17" opacity=".35" />
        <circle class="bgx-cell bgx-cell--small" cx="175" cy="100" r="11" fill="#0B0D17" opacity=".35" />
    </svg>
</div>

@once
    <style>
        .bgx-root {
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
            background-color: #0B0D17;
        }

        .bgx-grid {
            position: absolute;
            inset: 0;
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            -webkit-mask-image: radial-gradient(circle at center, black, transparent 80%);
            mask-image: radial-gradient(circle at center, black, transparent 80%);
        }

        .bgx-blob {
            position: absolute;
            border-radius: 9999px;
            mix-blend-mode: screen;
            animation: bgx-blob 10s infinite;
        }

        .bgx-blob--purple {
            top: -10%; left: -10%;
            width: 500px; height: 500px;
            background: rgba(147, 51, 234, .20);
            filter: blur(100px);
        }

        .bgx-blob--blue {
            top: 20%; right: -10%;
            width: 600px; height: 600px;
            background: rgba(37, 99, 235, .20);
            filter: blur(90px);
            animation-delay: 2s;
        }

        .bgx-blob--fuchsia {
            bottom: -20%; left: 20%;
            width: 800px; height: 800px;
            background: rgba(192, 38, 211, .10);
            filter: blur(70px);
            animation-delay: 4s;
        }

        /* Shape 1: kanan atas */
        .bgx-shape {
            position: absolute;
            top: 25%;
            right: 25%;
            width: 16rem;
            height: 16rem;
            opacity: .2;
            color: #8B5CF6;
            animation: bgx-float 3s ease-in-out infinite;
        }

        /* Shape 2: kiri bawah (tidak di pojok) */
        .bgx-shape--2 {
            top: auto;
            right: auto;
            bottom: 18%;
            left: 12%;
            width: 18rem;
            height: 14rem;
            color: #3B82F6;
            animation: bgx-float-2 4s ease-in-out infinite;
        }

        /* Sel anak bergerak menjauh lalu menyatu lagi */
        .bgx-cell--small {
            animation: bgx-divide 6s ease-in-out infinite;
        }

        /* Sel induk sedikit "bernapas" */
        .bgx-cell--big {
            transform-box: fill-box;
            transform-origin: center;
            animation: bgx-breathe 6s ease-in-out infinite;
        }

        @keyframes bgx-blob {
            0%   { transform: translate(0px, 0px) scale(1); }
            33%  { transform: translate(30px, -50px) scale(1.1); }
            66%  { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes bgx-float {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-50px); }
        }

        @keyframes bgx-float-2 {
            0%, 100% { transform: translateY(0); }
            50%      { transform: translateY(-40px); }
        }

        @keyframes bgx-divide {
            0%, 100% { transform: translateX(-10px); }
            50%      { transform: translateX(24px); }
        }

        @keyframes bgx-breathe {
            0%, 100% { transform: scale(1); }
            50%      { transform: scale(1.04); }
        }
    </style>
@endonce