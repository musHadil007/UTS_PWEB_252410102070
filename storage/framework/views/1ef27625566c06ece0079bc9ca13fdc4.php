<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('page-header'); ?>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <h1 class="font-display text-2xl font-bold text-white">
                Selamat datang, <span class="text-brand-400"><?php echo e($username); ?></span> 👋
            </h1>
            <p class="text-sm text-slate-400 mt-0.5">
                <?php echo e(now()->locale('id')->isoFormat('dddd, D MMMM Y')); ?> &middot; Semua sistem berjalan normal
            </p>
        </div>
        <div class="flex items-center gap-2 text-xs text-emerald-400 bg-emerald-500/10
                    border border-emerald-500/20 px-3 py-1.5 rounded-full">
            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
            Sistem Online
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6">
        <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="stat-card bg-surface-card border border-surface-border rounded-2xl p-5 transition-all duration-200">
            <div class="flex items-start justify-between mb-4">
                <div>
                    <p class="text-xs text-slate-500 font-medium"><?php echo e($stat['label']); ?></p>
                    <p class="text-2xl font-bold text-white mt-1 font-display"><?php echo e($stat['value']); ?></p>
                </div>
                <div class="w-10 h-10 rounded-xl
                            <?php if($stat['color'] === 'indigo'): ?> bg-indigo-500/15 text-indigo-400
                            <?php elseif($stat['color'] === 'emerald'): ?> bg-emerald-500/15 text-emerald-400
                            <?php elseif($stat['color'] === 'amber'): ?> bg-amber-500/15 text-amber-400
                            <?php else: ?> bg-rose-500/15 text-rose-400 <?php endif; ?>
                            flex items-center justify-center shrink-0">
                    <i data-lucide="<?php echo e($stat['icon']); ?>" class="w-5 h-5"></i>
                </div>
            </div>
            <div class="flex items-center gap-1.5">
                <span class="inline-flex items-center gap-0.5 text-xs font-semibold
                             <?php echo e($stat['up'] ? 'text-emerald-400' : 'text-rose-400'); ?>">
                    <i data-lucide="<?php echo e($stat['up'] ? 'trending-up' : 'trending-down'); ?>" class="w-3 h-3"></i>
                    <?php echo e($stat['change']); ?>

                </span>
                <span class="text-xs text-slate-600">vs bulan lalu</span>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

        
        <div class="lg:col-span-2 bg-surface-card border border-surface-border rounded-2xl p-5">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-sm font-semibold text-white">Aktivitas Terbaru</h2>
                <span class="text-xs text-brand-400 cursor-pointer hover:underline">Lihat semua</span>
            </div>

            <div class="space-y-1">
                <?php $__currentLoopData = $recentActivities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-start gap-3 p-3 rounded-xl hover:bg-surface-muted transition group">
                    <div class="mt-0.5 w-7 h-7 rounded-lg shrink-0
                                <?php if($activity['type'] === 'user'): ?> bg-indigo-500/15 text-indigo-400
                                <?php elseif($activity['type'] === 'product'): ?> bg-emerald-500/15 text-emerald-400
                                <?php elseif($activity['type'] === 'transaction'): ?> bg-amber-500/15 text-amber-400
                                <?php elseif($activity['type'] === 'report'): ?> bg-purple-500/15 text-purple-400
                                <?php else: ?> bg-slate-500/15 text-slate-400 <?php endif; ?>
                                flex items-center justify-center">
                        <i data-lucide="
                            <?php if($activity['type'] === 'user'): ?> user-plus
                            <?php elseif($activity['type'] === 'product'): ?> package
                            <?php elseif($activity['type'] === 'transaction'): ?> credit-card
                            <?php elseif($activity['type'] === 'report'): ?> file-text
                            <?php else: ?> server <?php endif; ?>" class="w-3.5 h-3.5"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-slate-200 group-hover:text-white transition">
                            <?php echo e($activity['desc']); ?>

                        </p>
                    </div>
                    <span class="text-xs text-slate-600 shrink-0"><?php echo e($activity['time']); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div class="bg-surface-card border border-surface-border rounded-2xl p-5 flex flex-col gap-5">

            
            <div class="text-center">
                <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-brand-500 to-purple-600
                            flex items-center justify-center text-xl font-bold text-white mx-auto mb-3
                            shadow-lg shadow-brand-500/25">
                    <?php echo e(strtoupper(substr($username, 0, 2))); ?>

                </div>
                <p class="font-semibold text-white"><?php echo e($username); ?></p>
                <p class="text-xs text-slate-500 mt-0.5">Administrator</p>
            </div>

            <div class="space-y-2.5">
                <?php
                    $infos = [
                        ['icon' => 'mail',       'label' => 'Email',   'val' => strtolower($username).'@example.com'],
                        ['icon' => 'building-2', 'label' => 'Dept',    'val' => 'Teknologi Informasi'],
                        ['icon' => 'shield',     'label' => 'Role',    'val' => 'Super Admin'],
                    ];
                ?>
                <?php $__currentLoopData = $infos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center gap-2.5 text-xs">
                    <i data-lucide="<?php echo e($info['icon']); ?>" class="w-3.5 h-3.5 text-brand-400 shrink-0"></i>
                    <span class="text-slate-500 w-10 shrink-0"><?php echo e($info['label']); ?></span>
                    <span class="text-slate-200 truncate"><?php echo e($info['val']); ?></span>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <a href="<?php echo e(route('profile', ['username' => $username])); ?>"
               class="mt-auto w-full flex items-center justify-center gap-2 py-2.5 rounded-xl
                      border border-brand-500/40 text-brand-400 text-sm font-medium
                      hover:bg-brand-500/10 transition">
                <i data-lucide="user-circle" class="w-4 h-4"></i>
                Lihat Profil Lengkap
            </a>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hadil\nexopanel\resources\views/dashboard.blade.php ENDPATH**/ ?>