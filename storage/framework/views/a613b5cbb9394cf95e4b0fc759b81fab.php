<?php $__env->startSection('title', 'Masuk ke Akun'); ?>

<?php $__env->startSection('fullpage'); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    .login-bg {
        background:
            radial-gradient(ellipse 80% 60% at 70% 40%, rgba(99,102,241,.18) 0%, transparent 60%),
            radial-gradient(ellipse 50% 40% at 20% 80%, rgba(139,92,246,.12) 0%, transparent 50%),
            #0f1117;
    }
    .input-field:focus {
        outline: none;
        border-color: #6366f1;
        box-shadow: 0 0 0 3px rgba(99,102,241,.18);
    }
    .grid-pattern {
        background-image:
            linear-gradient(rgba(99,102,241,.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(99,102,241,.05) 1px, transparent 1px);
        background-size: 32px 32px;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="login-bg grid-pattern min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md animate-slide-up">

        
        <div class="bg-surface-card border border-surface-border rounded-2xl p-8 shadow-2xl">

            
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl
                            bg-gradient-to-br from-brand-500 to-purple-600 shadow-lg shadow-brand-500/30 mb-4">
                    <i data-lucide="zap" class="w-7 h-7 text-white"></i>
                </div>
                <h1 class="font-display text-2xl font-bold text-white">NexaPanel</h1>
                <p class="text-sm text-slate-400 mt-1">Masuk untuk melanjutkan ke dashboard</p>
            </div>

            
            <?php if($errors->any()): ?>
                <div class="mb-5 p-3.5 rounded-xl bg-rose-500/10 border border-rose-500/30 flex gap-3">
                    <i data-lucide="alert-circle" class="w-4 h-4 text-rose-400 shrink-0 mt-0.5"></i>
                    <ul class="text-sm text-rose-300 space-y-0.5">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            
            <form action="<?php echo e(route('login.post')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>

                
                <div>
                    <label for="username" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Username
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-500">
                            <i data-lucide="user" class="w-4 h-4"></i>
                        </span>
                        <input
                            type="text"
                            id="username"
                            name="username"
                            value="<?php echo e(old('username')); ?>"
                            placeholder="Masukkan username Anda"
                            autocomplete="username"
                            class="input-field w-full bg-surface-muted border border-surface-border rounded-xl
                                   pl-10 pr-4 py-3 text-sm text-slate-100 placeholder:text-slate-600
                                   transition-all duration-200
                                   <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-rose-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-rose-400"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <div>
                    <label for="password" class="block text-sm font-medium text-slate-300 mb-1.5">
                        Password
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-slate-500">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </span>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Minimal 6 karakter"
                            autocomplete="current-password"
                            class="input-field w-full bg-surface-muted border border-surface-border rounded-xl
                                   pl-10 pr-4 py-3 text-sm text-slate-100 placeholder:text-slate-600
                                   transition-all duration-200
                                   <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-rose-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-xs text-rose-400"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                
                <button type="submit"
                        class="w-full bg-brand-500 hover:bg-brand-600 active:bg-brand-700
                               text-white font-semibold text-sm py-3 rounded-xl
                               transition-all duration-200 shadow-lg shadow-brand-500/25
                               flex items-center justify-center gap-2 mt-2">
                    <i data-lucide="log-in" class="w-4 h-4"></i>
                    Masuk ke Dashboard
                </button>
            </form>

            
            <div class="mt-6 p-4 rounded-xl bg-surface-muted border border-surface-border">
                <p class="text-xs text-slate-500 text-center mb-2 font-medium">Akun Demo Tersedia</p>
                <div class="flex gap-2 justify-center flex-wrap">
                    <?php $__currentLoopData = ['admin_utama', 'budi_santoso', 'siti_rahayu']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $demo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button onclick="document.getElementById('username').value='<?php echo e($demo); ?>';document.getElementById('password').value='password123';"
                                class="text-xs px-3 py-1.5 rounded-lg bg-brand-500/10 text-brand-400
                                       border border-brand-500/20 hover:bg-brand-500/20 transition">
                            <?php echo e($demo); ?>

                        </button>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        
        <p class="text-center text-xs text-slate-600 mt-4">
            Laravel MVC &middot; Blade Templating &middot; &copy; <?php echo e(date('Y')); ?> NexaPanel
        </p>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hadil\nexopanel\resources\views/login.blade.php ENDPATH**/ ?>