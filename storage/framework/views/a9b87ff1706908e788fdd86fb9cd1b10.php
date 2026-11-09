<?php $__env->startSection('title', 'Pengelolaan Produk'); ?>

<?php $__env->startSection('page-header'); ?>
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
        <div>
            <h1 class="font-display text-2xl font-bold text-white">Pengelolaan Produk</h1>
            <p class="text-sm text-slate-400 mt-0.5">
                <?php echo e(count($products)); ?> produk terdaftar dalam sistem
            </p>
        </div>
        <button class="inline-flex items-center gap-2 bg-brand-500 hover:bg-brand-600 text-white
                       text-sm font-medium px-4 py-2.5 rounded-xl transition shadow-lg shadow-brand-500/25">
            <i data-lucide="plus" class="w-4 h-4"></i>
            Tambah Produk
        </button>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="bg-surface-card border border-surface-border rounded-2xl p-4 mb-5 flex flex-col sm:flex-row gap-3">

        
        <div class="relative flex-1">
            <span class="absolute inset-y-0 left-3 flex items-center text-slate-500">
                <i data-lucide="search" class="w-4 h-4"></i>
            </span>
            <input id="searchInput" type="text" placeholder="Cari nama produk..."
                   oninput="filterTable()"
                   class="w-full bg-surface-muted border border-surface-border rounded-xl
                          pl-10 pr-4 py-2.5 text-sm text-slate-100 placeholder:text-slate-600
                          focus:outline-none focus:border-brand-500 transition">
        </div>

        
        <div class="flex gap-2 flex-wrap">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button onclick="filterCategory('<?php echo e($cat); ?>')"
                    data-cat="<?php echo e($cat); ?>"
                    class="cat-btn text-xs px-3 py-2 rounded-lg border transition font-medium
                           <?php echo e($cat === 'Semua'
                               ? 'bg-brand-500/15 border-brand-500/40 text-brand-400'
                               : 'bg-surface-muted border-surface-border text-slate-400 hover:text-white hover:border-brand-500/30'); ?>">
                <?php echo e($cat); ?>

            </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    
    <?php
        $totalAktif = collect($products)->where('status', 'Aktif')->count();
        $totalHabis = collect($products)->where('status', 'Habis')->count();
    ?>
    <div class="grid grid-cols-3 gap-3 mb-5">
        <div class="bg-surface-card border border-surface-border rounded-xl p-3 text-center">
            <p class="text-xl font-bold text-white font-display"><?php echo e(count($products)); ?></p>
            <p class="text-xs text-slate-500 mt-0.5">Total Produk</p>
        </div>
        <div class="bg-surface-card border border-emerald-500/20 rounded-xl p-3 text-center">
            <p class="text-xl font-bold text-emerald-400 font-display"><?php echo e($totalAktif); ?></p>
            <p class="text-xs text-slate-500 mt-0.5">Aktif</p>
        </div>
        <div class="bg-surface-card border border-rose-500/20 rounded-xl p-3 text-center">
            <p class="text-xl font-bold text-rose-400 font-display"><?php echo e($totalHabis); ?></p>
            <p class="text-xs text-slate-500 mt-0.5">Habis</p>
        </div>
    </div>

    
    <div class="bg-surface-card border border-surface-border rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm" id="productTable">
                <thead>
                    <tr class="border-b border-surface-border">
                        <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">ID</th>
                        <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Nama Produk</th>
                        <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden md:table-cell">Kategori</th>
                        <th class="text-center px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Stok</th>
                        <th class="text-left px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider hidden lg:table-cell">Harga</th>
                        <th class="text-center px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Status</th>
                        <th class="text-center px-5 py-3.5 text-xs font-semibold text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-surface-border">
                    
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="product-row hover:bg-surface-muted/50 transition group"
                        data-category="<?php echo e($product['kategori']); ?>"
                        data-name="<?php echo e(strtolower($product['nama'])); ?>">

                        
                        <td class="px-5 py-4">
                            <span class="text-xs font-mono text-brand-400 bg-brand-500/10 px-2 py-1 rounded">
                                <?php echo e($product['id']); ?>

                            </span>
                        </td>

                        
                        <td class="px-5 py-4">
                            <p class="font-medium text-slate-100"><?php echo e($product['nama']); ?></p>
                            <p class="text-xs text-slate-500 md:hidden mt-0.5"><?php echo e($product['kategori']); ?></p>
                        </td>

                        
                        <td class="px-5 py-4 hidden md:table-cell">
                            <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-lg
                                         bg-surface-muted text-slate-300 border border-surface-border">
                                <?php echo e($product['kategori']); ?>

                            </span>
                        </td>

                        
                        <td class="px-5 py-4 text-center hidden lg:table-cell">
                            <span class="font-semibold <?php echo e($product['stok'] === 0 ? 'text-rose-400' : ($product['stok'] < 15 ? 'text-amber-400' : 'text-slate-200')); ?>">
                                <?php echo e($product['stok']); ?>

                            </span>
                        </td>

                        
                        <td class="px-5 py-4 hidden lg:table-cell">
                            <span class="text-slate-200 font-medium"><?php echo e($product['harga']); ?></span>
                        </td>

                        
                        <td class="px-5 py-4 text-center">
                            <?php if($product['status'] === 'Aktif'): ?>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold
                                             px-2.5 py-1 rounded-full bg-emerald-500/15 text-emerald-400
                                             border border-emerald-500/20">
                                    <span class="w-1 h-1 rounded-full bg-emerald-400"></span>
                                    Aktif
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold
                                             px-2.5 py-1 rounded-full bg-rose-500/15 text-rose-400
                                             border border-rose-500/20">
                                    <span class="w-1 h-1 rounded-full bg-rose-400"></span>
                                    Habis
                                </span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="px-5 py-4">
                            <div class="flex items-center justify-center gap-1.5 opacity-70 group-hover:opacity-100 transition">
                                <button class="p-1.5 rounded-lg text-brand-400 hover:bg-brand-500/15 transition" title="Edit">
                                    <i data-lucide="pencil" class="w-3.5 h-3.5"></i>
                                </button>
                                <button class="p-1.5 rounded-lg text-rose-400 hover:bg-rose-500/15 transition" title="Hapus">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

        
        <div class="border-t border-surface-border px-5 py-3 flex items-center justify-between text-xs text-slate-500">
            <span>Menampilkan <?php echo e(count($products)); ?> dari <?php echo e(count($products)); ?> produk</span>
            <div class="flex gap-1">
                <button class="px-3 py-1.5 rounded-lg bg-brand-500/15 text-brand-400 border border-brand-500/30 font-medium">1</button>
                <button class="px-3 py-1.5 rounded-lg hover:bg-surface-muted transition">2</button>
                <button class="px-3 py-1.5 rounded-lg hover:bg-surface-muted transition">3</button>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function filterTable() {
        const q = document.getElementById('searchInput').value.toLowerCase();
        document.querySelectorAll('.product-row').forEach(row => {
            row.style.display = row.dataset.name.includes(q) ? '' : 'none';
        });
    }

    function filterCategory(cat) {
        // Update active button
        document.querySelectorAll('.cat-btn').forEach(btn => {
            const isActive = btn.dataset.cat === cat;
            btn.className = btn.className
                .replace(/bg-brand-500\/15|border-brand-500\/40|text-brand-400|bg-surface-muted|border-surface-border|text-slate-400/g, '')
                .trim();
            btn.classList.add(...(isActive
                ? ['bg-brand-500/15','border-brand-500/40','text-brand-400']
                : ['bg-surface-muted','border-surface-border','text-slate-400']));
        });
        // Filter rows
        document.querySelectorAll('.product-row').forEach(row => {
            row.style.display = (cat === 'Semua' || row.dataset.category === cat) ? '' : 'none';
        });
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Hadil\nexopanel\resources\views/pengelolaan.blade.php ENDPATH**/ ?>