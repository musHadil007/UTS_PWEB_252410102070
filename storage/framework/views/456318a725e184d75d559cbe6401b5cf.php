
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['username' => 'Tamu']));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['username' => 'Tamu']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<header class="bg-surface-card border-b border-surface-border px-4 md:px-6 py-3 flex items-center justify-between shrink-0">

    
    <div class="flex items-center gap-3">
        
        <button onclick="openSidebar()"
                class="lg:hidden p-2 rounded-lg text-slate-400 hover:text-white hover:bg-surface-muted transition"
                aria-label="Buka menu">
            <i data-lucide="menu" class="w-5 h-5"></i>
        </button>

        
        <div class="hidden sm:flex items-center gap-1.5 text-sm text-slate-400">
            <span class="text-brand-400 font-medium">NexaPanel</span>
            <i data-lucide="chevron-right" class="w-3.5 h-3.5"></i>
            <span class="text-slate-200 capitalize">
                <?php
                    $segments = explode('/', request()->path());
                    $page = end($segments);
                    $labels = [
                        '/'           => 'Login',
                        'dashboard'   => 'Dashboard',
                        'pengelolaan' => 'Pengelolaan',
                        'profile'     => 'Profil',
                    ];
                    echo $labels[$page] ?? ucfirst($page);
                ?>
            </span>
        </div>
    </div>

    
    <div class="flex items-center gap-2 md:gap-4">

        
        <button class="relative p-2 rounded-lg text-slate-400 hover:text-white hover:bg-surface-muted transition">
            <i data-lucide="bell" class="w-5 h-5"></i>
            <span class="absolute top-1.5 right-1.5 w-2 h-2 bg-brand-500 rounded-full ring-2 ring-surface-card"></span>
        </button>

        
        <a href="<?php echo e(route('profile', ['username' => $username])); ?>"
           class="flex items-center gap-2.5 px-3 py-1.5 rounded-xl bg-surface-muted hover:bg-surface-border transition group">
            
            <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-brand-500 to-purple-600
                        flex items-center justify-center text-xs font-bold text-white shrink-0">
                <?php echo e(strtoupper(substr($username, 0, 2))); ?>

            </div>
            <span class="hidden sm:block text-sm font-medium text-slate-200 group-hover:text-white max-w-[120px] truncate">
                <?php echo e($username); ?>

            </span>
            <i data-lucide="chevron-down" class="w-3.5 h-3.5 text-slate-400 hidden sm:block"></i>
        </a>

        
        <a href="<?php echo e(route('logout')); ?>"
           class="hidden md:flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-slate-400 hover:text-rose-400 hover:bg-rose-500/10 transition text-sm">
            <i data-lucide="log-out" class="w-4 h-4"></i>
            <span class="hidden lg:inline">Keluar</span>
        </a>
    </div>
</header>
<?php /**PATH C:\Users\Hadil\nexopanel\resources\views/components/navbar.blade.php ENDPATH**/ ?>