{{--
    Komponen: x-footer
    Digunakan di: layouts/app.blade.php
--}}
<footer class="bg-surface-card border-t border-surface-border px-4 md:px-6 py-3 shrink-0">
    <div class="flex flex-col sm:flex-row items-center justify-between gap-1 text-xs text-slate-500">

        <div class="flex items-center gap-1.5">
            <span class="font-display font-semibold text-brand-400">NexaPanel</span>
            <span>—</span>
            <span>Sistem Manajemen Terpadu</span>
        </div>

        <div class="flex items-center gap-3">
            <span>Laravel MVC &middot; Blade Templating</span>
            <span class="hidden sm:inline">&middot;</span>
            <span class="hidden sm:inline flex items-center gap-1">
                <i data-lucide="shield-check" class="w-3 h-3 inline text-emerald-500"></i>
                Versi 1.0.0
            </span>
            <span>&middot; &copy; {{ date('Y') }}</span>
        </div>

    </div>
</footer>
