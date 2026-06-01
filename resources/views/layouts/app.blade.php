<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="LaFamiglia808 - Studio di Produzione Musicale Professionale">
    <title>@yield('title', 'LaFamiglia808 | Studio di Produzione')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        red: { 600: '#DC2626', 700: '#B91C1C', 500: '#EF4444' },
                        brand: {
                            red: '#DC2626',
                            black: '#0A0A0A',
                            dark: '#111111',
                            gray: '#1A1A1A',
                            mid: '#2A2A2A',
                            light: '#888888',
                            white: '#F5F5F5',
                        }
                    },
                    fontFamily: {
                        display: ['"Bebas Neue"', 'sans-serif'],
                        body: ['"Space Grotesk"', 'sans-serif'],
                        mono: ['"JetBrains Mono"', 'monospace'],
                    }
                }
            }
        }
    </script>

    <style>
        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            background-color: #0A0A0A;
            color: #F5F5F5;
            font-family: 'Space Grotesk', sans-serif;
            overflow-x: hidden;
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #0A0A0A; }
        ::-webkit-scrollbar-thumb { background: #DC2626; border-radius: 2px; }

        /* Selection */
        ::selection { background: #DC2626; color: #fff; }

        /* Nav */
        .nav-link {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #888;
            transition: color 0.2s;
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 1px;
            background: #DC2626;
            transition: width 0.3s;
        }
        .nav-link:hover, .nav-link.active { color: #F5F5F5; }
        .nav-link:hover::after, .nav-link.active::after { width: 100%; }

        /* Noise texture overlay */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noise'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noise)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.4;
        }

        /* Red accent line */
        .red-line { width: 60px; height: 2px; background: #DC2626; }
        .red-dot::before {
            content: '//';
            color: #DC2626;
            font-family: 'JetBrains Mono', monospace;
            margin-right: 0.5rem;
            font-size: 0.875rem;
        }

        /* Animated counter */
        .stat-number {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 4rem;
            color: #DC2626;
            line-height: 1;
        }

        /* Card hover */
        .card-hover {
            border: 1px solid #2A2A2A;
            transition: border-color 0.3s, transform 0.3s;
        }
        .card-hover:hover {
            border-color: #DC2626;
            transform: translateY(-4px);
        }

        /* Glitch effect on logo */
        @keyframes glitch {
            0% { clip-path: inset(0 0 95% 0); transform: translate(-2px, 0); }
            10% { clip-path: inset(80% 0 5% 0); transform: translate(2px, 0); }
            20% { clip-path: inset(40% 0 50% 0); transform: translate(0, 0); }
            30% { clip-path: inset(60% 0 30% 0); transform: translate(-2px, 0); }
            40% { clip-path: inset(20% 0 70% 0); transform: translate(2px, 0); }
            50%, 100% { clip-path: inset(0 0 100% 0); transform: translate(0, 0); }
        }
        .glitch-text { position: relative; }
        .glitch-text::before, .glitch-text::after {
            content: attr(data-text);
            position: absolute;
            top: 0; left: 0;
            opacity: 0;
        }
        .glitch-text:hover::before {
            color: #DC2626;
            animation: glitch 0.4s steps(1) 1;
            opacity: 1;
        }
        .glitch-text:hover::after {
            color: #fff;
            animation: glitch 0.4s steps(1) 0.1s 1;
            opacity: 0.5;
        }

        /* Marquee */
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        .marquee-inner { animation: marquee 20s linear infinite; }
        .marquee-inner:hover { animation-play-state: paused; }

        /* Button styles */
        .btn-red {
            background: #DC2626;
            color: #fff;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 0.875rem 2rem;
            border: 1px solid #DC2626;
            transition: background 0.2s, color 0.2s, transform 0.15s;
            display: inline-block;
        }
        .btn-red:hover { background: transparent; color: #DC2626; transform: translateY(-1px); }
        .btn-outline {
            background: transparent;
            color: #F5F5F5;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            padding: 0.875rem 2rem;
            border: 1px solid #2A2A2A;
            transition: border-color 0.2s, color 0.2s, transform 0.15s;
            display: inline-block;
        }
        .btn-outline:hover { border-color: #DC2626; color: #DC2626; transform: translateY(-1px); }

        /* Footer */
        footer { border-top: 1px solid #1A1A1A; }
    </style>

    @stack('styles')
</head>
<body>

<!-- NAV -->
<header id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" style="background: rgba(10,10,10,0.85); backdrop-filter: blur(16px); border-bottom: 1px solid #1A1A1A;">
    <nav class="max-w-7xl mx-auto px-6 flex items-center justify-between h-16">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span style="width:8px;height:8px;background:#DC2626;display:block;"></span>
            <span class="font-display text-white glitch-text text-xl tracking-widest" data-text="LAFAMIGLIA808">LAFAMIGLIA808</span>
        </a>

        <!-- Desktop Nav -->
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
            <a href="{{ route('services') }}" class="nav-link {{ request()->routeIs('services') ? 'active' : '' }}">Servizi</a>
            <a href="{{ route('portfolio') }}" class="nav-link {{ request()->routeIs('portfolio') ? 'active' : '' }}">Portfolio</a>
            <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Chi Siamo</a>
            <a href="{{ route('pricing') }}" class="nav-link {{ request()->routeIs('pricing') ? 'active' : '' }}">Prezzi</a>
            <a href="{{ route('booking') }}" class="nav-link {{ request()->routeIs('booking') ? 'active' : '' }}">Booking</a>
            <a href="{{ route('contact') }}" class="btn-red text-xs">Contattaci</a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button id="menuToggle" class="md:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path id="menuIcon" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </nav>

    <!-- Mobile Nav -->
    <div id="mobileMenu" class="hidden md:hidden px-6 pb-6 flex flex-col gap-4" style="border-top: 1px solid #1A1A1A;">
        <a href="{{ route('home') }}" class="nav-link py-2">Home</a>
        <a href="{{ route('services') }}" class="nav-link py-2">Servizi</a>
        <a href="{{ route('portfolio') }}" class="nav-link py-2">Portfolio</a>
        <a href="{{ route('about') }}" class="nav-link py-2">Chi Siamo</a>
        <a href="{{ route('pricing') }}" class="nav-link py-2">Prezzi</a>
        <a href="{{ route('booking') }}" class="nav-link py-2">Booking</a>
        <a href="{{ route('contact') }}" class="btn-red text-center mt-2">Contattaci</a>
    </div>
</header>

<!-- MAIN -->
<main class="pt-16">
    @yield('content')
</main>

<!-- MARQUEE STRIP -->
<div class="overflow-hidden py-4" style="background:#111; border-top:1px solid #1A1A1A; border-bottom:1px solid #1A1A1A;">
    <div class="marquee-inner flex whitespace-nowrap" style="width: max-content;">
        @foreach(range(1, 8) as $i)
            <span class="font-display text-2xl tracking-widest text-white mx-8">LAFAMIGLIA808</span>
            <span class="font-display text-2xl tracking-widest text-red-600 mx-8">★</span>
            <span class="font-display text-2xl tracking-widest" style="color:#2A2A2A; margin: 0 2rem;">BEAT PRODUCTION</span>
            <span class="font-display text-2xl tracking-widest text-red-600 mx-8">★</span>
        @endforeach
    </div>
</div>

<!-- FOOTER -->
<footer class="py-16 px-6" style="background:#0A0A0A;">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">

            <!-- Brand -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <span style="width:8px;height:8px;background:#DC2626;display:block;"></span>
                    <span class="font-display text-white text-xl tracking-widest">LAFAMIGLIA808</span>
                </div>
                <p class="text-sm leading-relaxed mb-6" style="color:#888; max-width:340px;">
                    Studio di produzione musicale indipendente. Beats, mixing, mastering e molto altro. Musica che colpisce, suono che resta.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-800 hover:border-red-600 transition-colors" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-800 hover:border-red-600 transition-colors" aria-label="YouTube">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center border border-gray-800 hover:border-red-600 transition-colors" aria-label="SoundCloud">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M11.56 8.87V17h8.76c1.49-.01 2.68-1.22 2.68-2.72 0-1.49-1.19-2.7-2.68-2.7-.14 0-.28.01-.43.04-.1-2.35-2.01-4.23-4.36-4.23-1.41 0-2.66.59-3.57 1.51l.6.97zM0 15c0 1.1.9 2 2 2s2-.9 2-2-.9-2-2-2-2 .9-2 2zm5 0c0 1.1.9 2 2 2s2-.9 2-2V9c0-1.1-.9-2-2-2s-2 .9-2 2v6z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Links -->
            <div>
                <h4 class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4">Navigazione</h4>
                <ul class="space-y-3">
                    @foreach([['home','Home'],['services','Servizi'],['portfolio','Portfolio'],['pricing','Prezzi'],['booking','Booking'],['about','Chi Siamo'],['contact','Contatti']] as $link)
                    <li><a href="{{ route($link[0]) }}" class="text-sm hover:text-red-600 transition-colors" style="color:#888;">{{ $link[1] }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4">Contatti</h4>
                <ul class="space-y-3 text-sm" style="color:#888;">
                    <li class="flex items-start gap-2">
                        <span class="text-red-600 mt-0.5">→</span>
                        <span>info@lafamiglia808.com</span>
                    </li>
                    <li class="flex items-start gap-2">
                        <span class="text-red-600 mt-0.5">→</span>
                        <span>CATANIA, Italia</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Bar -->
        <div class="flex flex-col md:flex-row items-center justify-between pt-8" style="border-top: 1px solid #1A1A1A;">
            <p class="font-mono text-xs" style="color:#444;">© {{ date('Y') }} LaFamiglia808. All rights reserved.</p>
            <a href="{{ route('admin.login') }}" class="font-mono text-xs mt-4 md:mt-0 hover:text-red-600 transition-colors" style="color:#333;">[ admin ]</a>
        </div>
    </div>
</footer>

<!-- Alpine.js -->
<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

<script>
    // Mobile menu
    const toggle = document.getElementById('menuToggle');
    const menu = document.getElementById('mobileMenu');
    toggle.addEventListener('click', () => menu.classList.toggle('hidden'));

    // Navbar scroll
    window.addEventListener('scroll', () => {
        const nav = document.getElementById('navbar');
        if (window.scrollY > 50) {
            nav.style.background = 'rgba(10,10,10,0.98)';
        } else {
            nav.style.background = 'rgba(10,10,10,0.85)';
        }
    });
</script>

@stack('scripts')
</body>
</html>
