<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="ZYLPH - Premium sports car dealership. Curated selection of supercars, hypercars, and classic vehicles. Explore the finest automotive excellence.">
    <meta name="keywords"
        content="luxury cars, sports cars, supercars, hypercars, classic cars, premium automotive, car dealership">
    <meta name="author" content="ZYLPH">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="ZYLPH - Premium Sports Cars">
    <meta property="og:description"
        content="Experience the art of speed. Curated selection of the world's most exceptional sports cars.">
    <meta property="og:image" content="{{ asset('images/image1.jpeg') }}">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="ZYLPH - Premium Sports Cars">
    <meta name="twitter:description"
        content="Experience the art of speed. Curated selection of the world's most exceptional sports cars.">

    <title>@yield('title', 'ZYLPH - Premium Sports Cars')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml"
        href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🏎️</text></svg>">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <style>
        {!! file_get_contents(public_path('css/style.css')) !!}
    </style>

    @livewireStyles
</head>

<body class="bg-white text-zinc-900 font-sans antialiased">

    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-xl border-b border-zinc-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="logo">
                    <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tighter">ZYLPH</a>
                </div>

                <div class="hidden md:flex items-center space-x-10">
                    <a href="#home" class="nav-link">Home</a>
                    <a href="#catalog" class="nav-link">Catalog</a>
                    <a href="#experience" class="nav-link">Experience</a>
                    <a href="#about" class="nav-link">About</a>
                    <a href="#contact" class="nav-link">Contact</a>
                </div>

                <div class="flex items-center space-x-6">
                    <button id="searchToggle" class="text-zinc-600 hover:text-zinc-900 transition-colors"
                        aria-label="Open search">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <div class="relative">
                        <button onclick="Livewire.dispatch('toggleCart')"
                            class="text-zinc-600 hover:text-zinc-900 transition-colors" aria-label="Open shopping cart">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </button>
                        @livewire('cart', ['showBadge' => true])
                    </div>
                    <button id="mobileMenuToggle" class="md:hidden text-zinc-600 hover:text-zinc-900"
                        aria-label="Toggle mobile menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu md:hidden">
            <div class="px-6 pb-6 space-y-4 bg-white border-b border-zinc-100">
                <a href="#home" class="block nav-link">Home</a>
                <a href="#catalog" class="block nav-link">Catalog</a>
                <a href="#experience" class="block nav-link">Experience</a>
                <a href="#about" class="block nav-link">About</a>
                <a href="#contact" class="block nav-link">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Search Overlay -->
    <div id="searchOverlay" class="search-overlay">
        <div class="max-w-3xl mx-auto px-6">
            <div class="relative">
                <input type="text" id="searchInput" placeholder="Search for sports cars..."
                    class="w-full bg-white/10 backdrop-blur-xl border border-white/20 rounded-2xl px-6 py-5 text-lg text-white placeholder-white/60 focus:outline-none focus:border-white/40">
                <button id="searchClose"
                    class="absolute right-4 top-1/2 -translate-y-1/2 text-white/60 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Cart Sidebar -->
    @livewire('cart')

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-zinc-900 text-white py-16 px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                <div>
                    <div class="text-2xl font-bold mb-4">ZYLPH</div>
                    <p class="text-zinc-400 leading-relaxed">
                        Premium sports car dealership dedicated to automotive excellence.
                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#catalog" class="text-zinc-400 hover:text-white transition-colors">Catalog</a></li>
                        <li><a href="#experience"
                                class="text-zinc-400 hover:text-white transition-colors">Experience</a></li>
                        <li><a href="#about" class="text-zinc-400 hover:text-white transition-colors">About Us</a></li>
                        <li><a href="#contact" class="text-zinc-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-zinc-400 hover:text-white transition-colors">Buy</a></li>
                        <li><a href="#" class="text-zinc-400 hover:text-white transition-colors">Sell</a></li>
                        <li><a href="#" class="text-zinc-400 hover:text-white transition-colors">Trade</a></li>
                        <li><a href="#" class="text-zinc-400 hover:text-white transition-colors">Finance</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4">Contact</h4>
                    <ul class="space-y-2 text-zinc-400">
                        <li>info@zylph.com</li>
                        <li>+1 (555) 123-4567</li>
                        <li>123 Luxury Lane<br>Beverly Hills, CA 90210</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-zinc-800 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-zinc-400 text-sm mb-4 md:mb-0">
                    © 2026 ZYLPH. All rights reserved.
                </p>
                <div class="flex gap-6">
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-zinc-400 hover:text-white transition-colors">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    @livewireScripts

    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuToggle').addEventListener('click', function () {
            document.getElementById('mobileMenu').classList.toggle('active');
        });

        // Search Toggle
        document.getElementById('searchToggle').addEventListener('click', function () {
            document.getElementById('searchOverlay').classList.add('active');
            document.getElementById('searchInput').focus();
        });

        document.getElementById('searchClose').addEventListener('click', function () {
            document.getElementById('searchOverlay').classList.remove('active');
            document.getElementById('searchInput').value = '';
        });

        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    const mobileMenu = document.getElementById('mobileMenu');
                    if (mobileMenu.classList.contains('active')) {
                        mobileMenu.classList.remove('active');
                    }
                }
            });
        });

        // Close on Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                document.getElementById('searchOverlay').classList.remove('active');
            }
        });

        // Scroll Effect
        let lastScroll = 0;
        const nav = document.querySelector('nav');
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            if (currentScroll <= 0) {
                nav.style.boxShadow = 'none';
            } else {
                nav.style.boxShadow = '0 2px 10px rgba(0, 0, 0, 0.05)';
            }
            lastScroll = currentScroll;
        });
    </script>

    @stack('scripts')
</body>

</html>