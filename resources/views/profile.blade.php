{{--
    View: Profile
    Controller: PageController@showProfile
    Data dari Controller: $username, $profileData, $activityLog, $personalStats
    Username diterima dan diteruskan dari alur login → dashboard → profil
--}}
@extends('layouts.app')

@section('title', 'Profil — ' . $username)

@section('page-header')
    <div class="flex items-center justify-between">
        <div>
            <h1 class="font-display text-2xl font-bold text-white">Profil Saya</h1>
            <p class="text-sm text-slate-400 mt-0.5">Kelola informasi akun dan preferensi Anda</p>
        </div>
    </div>
@endsection

@section('content')

<div class="grid grid-cols-1 lg:grid-cols-3 gap-5">

    {{-- ── Kolom Kiri: Kartu Profil ──────────────────── --}}
    <div class="lg:col-span-1 space-y-4">

        {{-- Avatar Card --}}
        <div class="bg-surface-card border border-surface-border rounded-2xl overflow-hidden">
            {{-- Banner --}}
            <div class="h-24 bg-gradient-to-br from-brand-600 to-purple-700 relative">
                <div class="absolute inset-0 opacity-30"
                     style="background-image: radial-gradient(circle at 20% 50%, rgba(255,255,255,.2) 0%, transparent 60%)">
                </div>
            </div>

            <div class="px-5 pb-5">
                {{-- Avatar --}}
                <div class="-mt-10 mb-3">
                    <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-brand-500 to-purple-600
                                flex items-center justify-center text-2xl font-bold text-white
                                border-4 border-surface-card shadow-xl shadow-brand-500/25">
                        {{ $profileData['avatar_initial'] }}
                    </div>
                </div>

                <h2 class="text-lg font-bold text-white font-display">
                    {{ $profileData['nama_lengkap'] }}
                </h2>
                <p class="text-sm text-brand-400 font-medium">{{ $profileData['jabatan'] }}</p>

                <div class="mt-4 space-y-2.5 text-sm">
                    @php
                        $fields = [
                            ['icon' => 'at-sign',    'val' => $profileData['username']],
                            ['icon' => 'mail',       'val' => $profileData['email']],
                            ['icon' => 'building-2', 'val' => $profileData['departemen']],
                            ['icon' => 'map-pin',    'val' => $profileData['lokasi']],
                            ['icon' => 'calendar',   'val' => 'Bergabung ' . $profileData['bergabung']],
                        ];
                    @endphp

                    @foreach ($fields as $field)
                    <div class="flex items-center gap-2.5 text-xs">
                        <i data-lucide="{{ $field['icon'] }}" class="w-3.5 h-3.5 text-brand-400 shrink-0"></i>
                        <span class="text-slate-300">{{ $field['val'] }}</span>
                    </div>
                    @endforeach
                </div>

                <button class="mt-5 w-full py-2.5 rounded-xl border border-brand-500/40 text-brand-400
                               text-sm font-medium hover:bg-brand-500/10 transition flex items-center justify-center gap-2">
                    <i data-lucide="edit-3" class="w-4 h-4"></i>
                    Edit Profil
                </button>
            </div>
        </div>

        {{-- Statistik Personal --}}
        <div class="bg-surface-card border border-surface-border rounded-2xl p-5">
            <h3 class="text-sm font-semibold text-white mb-3">Statistik Aktivitas</h3>
            <div class="space-y-3">
                @foreach ($personalStats as $stat)
                <div class="flex items-center justify-between p-3 rounded-xl bg-surface-muted">
                    <span class="text-xs text-slate-400">{{ $stat['label'] }}</span>
                    <span class="text-sm font-bold text-white font-display">{{ $stat['value'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ── Kolom Kanan: Detail & Riwayat ─────────────── --}}
    <div class="lg:col-span-2 space-y-4">

        {{-- Informasi Akun --}}
        <div class="bg-surface-card border border-surface-border rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-white">Informasi Akun</h3>
                <span class="text-xs text-brand-400 cursor-pointer hover:underline">Ubah</span>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                @php
                    $accountFields = [
                        ['label' => 'Username',   'value' => $profileData['username'],    'icon' => 'user'],
                        ['label' => 'Nama Lengkap','value' => $profileData['nama_lengkap'],'icon' => 'id-card'],
                        ['label' => 'Email',       'value' => $profileData['email'],       'icon' => 'mail'],
                        ['label' => 'Jabatan',     'value' => $profileData['jabatan'],     'icon' => 'briefcase'],
                        ['label' => 'Departemen',  'value' => $profileData['departemen'],  'icon' => 'building-2'],
                        ['label' => 'Lokasi',      'value' => $profileData['lokasi'],      'icon' => 'map-pin'],
                    ];
                @endphp

                @foreach ($accountFields as $field)
                <div class="p-3.5 rounded-xl bg-surface-muted border border-surface-border">
                    <div class="flex items-center gap-2 mb-1.5">
                        <i data-lucide="{{ $field['icon'] }}" class="w-3.5 h-3.5 text-brand-400"></i>
                        <span class="text-xs text-slate-500 font-medium">{{ $field['label'] }}</span>
                    </div>
                    <p class="text-sm text-slate-100 font-medium pl-5">{{ $field['value'] }}</p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Riwayat Aktivitas --}}
        <div class="bg-surface-card border border-surface-border rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-sm font-semibold text-white">Riwayat Aktivitas</h3>
                <span class="text-xs px-2.5 py-1 rounded-full bg-brand-500/15 text-brand-400 border border-brand-500/20">
                    {{ count($activityLog) }} entri
                </span>
            </div>

            {{-- @foreach untuk render data activityLog dari Controller --}}
            <div class="space-y-1">
                @foreach ($activityLog as $log)
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-surface-muted transition group">
                    <div class="mt-0.5 w-8 h-8 rounded-lg bg-brand-500/10 text-brand-400
                                flex items-center justify-center shrink-0">
                        <i data-lucide="{{ $log['icon'] }}" class="w-4 h-4"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-slate-200 group-hover:text-white transition">
                            {{ $log['aktivitas'] }}
                        </p>
                        <p class="text-xs text-slate-600 mt-0.5 flex items-center gap-1">
                            <i data-lucide="calendar" class="w-3 h-3"></i>
                            {{ $log['tanggal'] }}
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Keamanan --}}
        <div class="bg-surface-card border border-surface-border rounded-2xl p-5">
            <h3 class="text-sm font-semibold text-white mb-4">Keamanan Akun</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                @php
                    $securityItems = [
                        ['icon' => 'key',           'title' => 'Ubah Password',           'desc' => 'Terakhir diubah 30 hari lalu', 'ok' => true],
                        ['icon' => 'smartphone',    'title' => 'Two-Factor Auth',          'desc' => 'Belum diaktifkan',              'ok' => false],
                        ['icon' => 'shield-check',  'title' => 'Verifikasi Email',         'desc' => 'Terverifikasi',                 'ok' => true],
                        ['icon' => 'activity',      'title' => 'Session Aktif',            'desc' => '1 perangkat aktif',             'ok' => true],
                    ];
                @endphp
                @foreach ($securityItems as $item)
                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-surface-muted border border-surface-border">
                    <div class="mt-0.5 w-8 h-8 rounded-lg {{ $item['ok'] ? 'bg-emerald-500/10 text-emerald-400' : 'bg-amber-500/10 text-amber-400' }}
                                flex items-center justify-center shrink-0">
                        <i data-lucide="{{ $item['icon'] }}" class="w-4 h-4"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-100">{{ $item['title'] }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
