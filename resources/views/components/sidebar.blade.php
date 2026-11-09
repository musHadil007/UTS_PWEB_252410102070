{{--
    Komponen: sidebar (di-include melalui @include)
    Digunakan di: layouts/app.blade.php
--}}
@php
    $currentRoute = request()->path();
    $username     = $username ?? request()->query('username', 'Tamu');

    $navItems = [
        [
            'route'  => 'dashboard',
            'label'  => 'Dashboard',
            'icon'   => 'layout-dashboard',
            'path'   => 'dashboard',
        ],
        [
            'route'  => 'pengelolaan',
            'label'  => 'Pengelolaan',
            'icon'   => 'package',
            'path'   => 'pengelolaan',
        ],
        [
            'route'  => 'profile',
            'label'  => 'Profil Saya',
            'icon'   => 'user-circle',
            'path'   => 'profile',
        ],
    ];
@endphp

<aside id="sidebar"
       class="w-64 bg-surface-card border-r border-surface-border flex flex-col shrink-0 h-full">

    {{-- Logo --}}
    <div class="px-6 py-5 border-b border-surface-border">
        <div class="flex items-center gap-2.5">
            <div class="w-8 h-8 rounded-lg bg-brand-500 flex items-center justify-center">
                <i data-lucide="zap" class="w-4 h-4 text-white"></i>
            </div>
            <span class="font-display text-xl font-bold text-white tracking-tight">NexaPanel</span>
        </div>
        <p class="mt-1 text-xs text-slate-500 pl-10">Manajemen Terpadu</p>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 py-4 px-3 overflow-y-auto">
        <p class="px-3 mb-2 text-xs font-semibold text-slate-600 uppercase tracking-widest">Menu Utama</p>

        @foreach ($navItems as $item)
            @php
                $isActive = $currentRoute === $item['path'];
                $href     = route($item['route'], ['username' => $username]);
            @endphp
            <a href="{{ $href }}"
               class="nav-link {{ $isActive ? 'active' : '' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-lg mb-1
                      text-sm font-medium transition-all duration-150
                      {{ $isActive ? 'text-brand-300' : 'text-slate-400 hover:text-slate-100 hover:bg-surface-muted' }}">
                <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4 shrink-0"></i>
                {{ $item['label'] }}
                @if ($isActive)
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-brand-400"></span>
                @endif
            </a>
        @endforeach

        <div class="my-4 border-t border-surface-border"></div>

        <p class="px-3 mb-2 text-xs font-semibold text-slate-600 uppercase tracking-widest">Sistem</p>

        <a href="{{ route('logout') }}"
           class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg mb-1
                  text-sm font-medium text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition">
            <i data-lucide="log-out" class="w-4 h-4 shrink-0"></i>
            Keluar
        </a>
    </nav>

    {{-- User card di bawah sidebar --}}
    <div class="p-3 border-t border-surface-border">
        <div class="flex items-center gap-3 p-3 rounded-xl bg-surface-muted">
            <div class="w-9 h-9 rounded-lg bg-gradient-to-br from-brand-500 to-purple-600
                        flex items-center justify-center text-sm font-bold text-white shrink-0">
                {{ strtoupper(substr($username, 0, 2)) }}
            </div>
            <div class="min-w-0">
                <p class="text-sm font-semibold text-slate-100 truncate">{{ $username }}</p>
                <p class="text-xs text-slate-500">Administrator</p>
            </div>
            <i data-lucide="settings" class="w-4 h-4 text-slate-500 ml-auto shrink-0"></i>
        </div>
    </div>
</aside>
