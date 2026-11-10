<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'NexaPanel') — NexaPanel</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans:    ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50:  '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            900: '#312e81',
                        },
                        surface: {
                            DEFAULT: '#0f1117',
                            card:    '#1a1d2e',
                            border:  '#252840',
                            muted:   '#2e3151',
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn .35s ease both',
                        'slide-up': 'slideUp .4s ease both',
                    },
                    keyframes: {
                        fadeIn:  { '0%': { opacity: 0 },              '100%': { opacity: 1 } },
                        slideUp: { '0%': { opacity: 0, transform: 'translateY(16px)' }, '100%': { opacity: 1, transform: 'translateY(0)' } },
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #0f1117; color: #e2e8f0; }

        /* Scrollbar styling */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1a1d2e; }
        ::-webkit-scrollbar-thumb { background: #4f46e5; border-radius: 3px; }

        /* Sidebar link active state */
        .nav-link.active {
            background: linear-gradient(90deg, rgba(99,102,241,.18) 0%, transparent 100%);
            border-left: 3px solid #6366f1;
            color: #a5b4fc;
        }
        .nav-link { border-left: 3px solid transparent; }

        /* Card glow */
        .stat-card:hover { box-shadow: 0 0 24px rgba(99,102,241,.18); }

        /* Mobile sidebar */
        #sidebar { transition: transform .3s ease; }
        @media (max-width: 1023px) {
            #sidebar { transform: translateX(-100%); position: fixed; z-index: 50; height: 100vh; }
            #sidebar.open { transform: translateX(0); }
        }
    </style>

    @yield('styles')
</head>
<body class="font-sans min-h-screen flex flex-col">

    @hasSection('fullpage')
        {{-- Halaman login: tanpa sidebar --}}
        @yield('content')
    @else
        {{-- Halaman dalam: dengan sidebar + navbar --}}
        <div class="flex h-screen overflow-hidden">

            {{-- ── Sidebar ──────────────────────────────── --}}
            @include('components.sidebar')

            {{-- ── Main Area ───────────────────────────── --}}
            <div class="flex-1 flex flex-col overflow-hidden">

                {{-- Top Navbar --}}
                <x-navbar :username="$username ?? 'Tamu'" />

                {{-- Page Content --}}
                <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 animate-fade-in">
                    {{-- Page Header --}}
                    @hasSection('page-header')
                        <div class="mb-6">
                            @yield('page-header')
                        </div>
                    @endif

                    @yield('content')
                </main>

                {{-- Footer --}}
                <x-footer />
            </div>
        </div>

        {{-- Mobile overlay --}}
        <div id="overlay" class="hidden fixed inset-0 bg-black/60 z-40 lg:hidden" onclick="closeSidebar()"></div>
    @endif

    {{-- Lucide icons init --}}
    <script>lucide.createIcons();</script>

    <script>
        function openSidebar() {
            document.getElementById('sidebar').classList.add('open');
            document.getElementById('overlay').classList.remove('hidden');
        }
        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('overlay').classList.add('hidden');
        }
    </script>

    @yield('scripts')
</body>
</html>
