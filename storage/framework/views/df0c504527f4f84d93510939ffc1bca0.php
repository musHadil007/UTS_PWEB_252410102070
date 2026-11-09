<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'NexaPanel'); ?> — NexaPanel</title>

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">

    
    <script src="https://cdn.tailwindcss.com"></script>

    
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

    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body class="font-sans min-h-screen flex flex-col">

    

    <?php if (! empty(trim($__env->yieldContent('fullpage')))): ?>
        
        <?php echo $__env->yieldContent('content'); ?>
    <?php else: ?>
        
        <div class="flex h-screen overflow-hidden">

            
            <?php echo $__env->make('components.sidebar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            
            <div class="flex-1 flex flex-col overflow-hidden">

                
                <?php if (isset($component)) { $__componentOriginala591787d01fe92c5706972626cdf7231 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginala591787d01fe92c5706972626cdf7231 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.navbar','data' => ['username' => $username ?? 'Tamu']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['username' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($username ?? 'Tamu')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $attributes = $__attributesOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__attributesOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala591787d01fe92c5706972626cdf7231)): ?>
<?php $component = $__componentOriginala591787d01fe92c5706972626cdf7231; ?>
<?php unset($__componentOriginala591787d01fe92c5706972626cdf7231); ?>
<?php endif; ?>

                
                <main class="flex-1 overflow-y-auto p-4 md:p-6 lg:p-8 animate-fade-in">
                    
                    <?php if (! empty(trim($__env->yieldContent('page-header')))): ?>
                        <div class="mb-6">
                            <?php echo $__env->yieldContent('page-header'); ?>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->yieldContent('content'); ?>
                </main>

                
                <?php if (isset($component)) { $__componentOriginal8a8716efb3c62a45938aca52e78e0322 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8a8716efb3c62a45938aca52e78e0322 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.footer','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('footer'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $attributes = $__attributesOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__attributesOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8a8716efb3c62a45938aca52e78e0322)): ?>
<?php $component = $__componentOriginal8a8716efb3c62a45938aca52e78e0322; ?>
<?php unset($__componentOriginal8a8716efb3c62a45938aca52e78e0322); ?>
<?php endif; ?>
            </div>
        </div>

        
        <div id="overlay" class="hidden fixed inset-0 bg-black/60 z-40 lg:hidden" onclick="closeSidebar()"></div>
    <?php endif; ?>

    
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

    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Hadil\nexopanel\resources\views/layouts/app.blade.php ENDPATH**/ ?>