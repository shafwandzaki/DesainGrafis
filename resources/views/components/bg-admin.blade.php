{{-- Pemakaian: <x-bg-utama /> tepat setelah <body>. Tidak butuh Alpine maupun Tailwind. --}}

<div class="bgx-root" aria-hidden="true">
    {{-- Glow gradasi --}}
    <div class="bgx-blob bgx-blob--purple"></div>
    <div class="bgx-blob bgx-blob--blue"></div>
    <div class="bgx-blob bgx-blob--fuchsia "></div>
</div>

@once
    <style>
        .bgx-root {
            position: fixed;
            inset: 0;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
            background-color: #060810;
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
            background: rgba(147, 51, 234, .12);
            filter: blur(100px);
        }

        .bgx-blob--blue {
            top: 20%; right: -10%;
            width: 600px; height: 600px;
            background: rgba(37, 99, 235, .12);
            filter: blur(90px);
            animation-delay: 2s;
        }

        .bgx-blob--fuchsia {
            bottom: -20%; left: 20%;
            width: 800px; height: 800px;
            background: rgba(192, 38, 211, .06);
            filter: blur(70px);
            animation-delay: 4s;
        }

        @keyframes bgx-blob {
            0%   { transform: translate(0px, 0px) scale(1); }
            33%  { transform: translate(30px, -50px) scale(1.1); }
            66%  { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }
    </style>
@endonce