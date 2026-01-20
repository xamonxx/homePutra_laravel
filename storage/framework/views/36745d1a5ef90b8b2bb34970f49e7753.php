

<?php $__env->startSection('title', 'Dashboard Overview'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>


<div class="mb-8 relative overflow-hidden rounded-2xl bg-linear-to-r from-primary/20 to-transparent p-1 border border-primary/10">
    <div class="relative z-10 glass-card bg-black/40 rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-6">
        <div>
            <h2 class="text-2xl font-bold text-white mb-2">Selamat Datang, <?php echo e(auth()->user()->display_name ?? 'Admin'); ?>! 👋</h2>
            <p class="text-gray-400 text-sm">Berikut adalah ringkasan kinerja website Home Putra Interior hari ini.</p>
        </div>
        <div class="flex items-center gap-3">
            <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="px-5 py-2.5 bg-primary hover:bg-primary-dark text-black font-bold rounded-lg transition-all shadow-lg shadow-primary/20 hover:shadow-primary/40 flex items-center gap-2 text-sm">
                <span class="material-symbols-outlined text-xl">add_photo_alternate</span>
                Upload Portfolio
            </a>
        </div>
    </div>
</div>


<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    
    <?php if (isset($component)) { $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-stat-card','data' => ['title' => 'Total Portfolio','value' => ''.e($stats['portfolios']).'','icon' => 'photo_library','color' => 'blue','route' => ''.e(route('admin.portfolio.index')).'','trend' => '+2 bulan ini']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Total Portfolio','value' => ''.e($stats['portfolios']).'','icon' => 'photo_library','color' => 'blue','route' => ''.e(route('admin.portfolio.index')).'','trend' => '+2 bulan ini']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $attributes = $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $component = $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-stat-card','data' => ['title' => 'Layanan','value' => ''.e($stats['services'] ?? 0).'','icon' => 'design_services','color' => 'green','route' => ''.e(route('admin.services.index')).'','trend' => '+1 Layanan baru']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Layanan','value' => ''.e($stats['services'] ?? 0).'','icon' => 'design_services','color' => 'green','route' => ''.e(route('admin.services.index')).'','trend' => '+1 Layanan baru']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $attributes = $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $component = $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-stat-card','data' => ['title' => 'Testimoni','value' => ''.e($stats['testimonials'] ?? 0).'','icon' => 'reviews','color' => 'purple','route' => ''.e(route('admin.testimonials.index')).'','trend' => '4.8 Rata-rata']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Testimoni','value' => ''.e($stats['testimonials'] ?? 0).'','icon' => 'reviews','color' => 'purple','route' => ''.e(route('admin.testimonials.index')).'','trend' => '4.8 Rata-rata']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $attributes = $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $component = $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
    
    <?php if (isset($component)) { $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-stat-card','data' => ['title' => 'Pesan Masuk','value' => ''.e($stats['unread_messages'] ?? 0).'','icon' => 'mail','color' => 'orange','route' => ''.e(route('admin.messages.index')).'','trend' => 'Perlu dibalas','isAlert' => $stats['unread_messages'] > 0]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-stat-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Pesan Masuk','value' => ''.e($stats['unread_messages'] ?? 0).'','icon' => 'mail','color' => 'orange','route' => ''.e(route('admin.messages.index')).'','trend' => 'Perlu dibalas','is_alert' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($stats['unread_messages'] > 0)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $attributes = $__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__attributesOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c)): ?>
<?php $component = $__componentOriginal6ccb7413961bd805d5db6baba7b26a7c; ?>
<?php unset($__componentOriginal6ccb7413961bd805d5db6baba7b26a7c); ?>
<?php endif; ?>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    
    <div class="lg:col-span-2 glass-card rounded-2xl overflow-hidden border border-white/5 flex flex-col h-full">
        <div class="p-6 border-b border-white/5 flex items-center justify-between">
            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">chat</span>
                Pesan Terbaru
            </h3>
            <a href="<?php echo e(route('admin.messages.index')); ?>" class="text-xs text-primary hover:text-white transition-colors">Lihat Semua</a>
        </div>

        <div class="flex-1 overflow-y-auto max-h-[400px] custom-scrollbar">
            <?php $__empty_1 = true; $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('admin.messages.show', $message->id)); ?>" class="group block p-4 hover:bg-white/5 transition-all border-b border-white/5 last:border-0">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 rounded-full bg-linear-to-br from-gray-800 to-black border border-white/10 flex items-center justify-center text-primary font-bold shadow-lg group-hover:scale-110 transition-transform">
                        <?php echo e($message->initials ?? substr($message->name ?? '?', 0, 2)); ?>

                    </div>
                    <div class="flex-1 min-w-0 pt-1">
                        <div class="flex items-center justify-between mb-1">
                            <h4 class="text-sm font-bold text-white group-hover:text-primary transition-colors truncate">
                                <?php echo e($message->full_name ?? $message->name ?? 'Guest'); ?>

                            </h4>
                            <span class="text-[10px] text-gray-500 bg-black/30 px-2 py-0.5 rounded-full border border-white/5">
                                <?php echo e($message->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                        <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed">
                            <?php echo e($message->message ?: 'Tidak ada isi pesan.'); ?>

                        </p>
                    </div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="h-64 flex flex-col items-center justify-center text-gray-500 gap-3">
                <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl opacity-50">inbox</span>
                </div>
                <p class="text-sm">Belum ada pesan baru.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>

    
    <div class="glass-card rounded-2xl p-6 border border-white/5 h-full">
        <h3 class="text-lg font-bold text-white mb-6 flex items-center gap-2">
            <span class="material-symbols-outlined text-yellow-500">bolt</span>
            Aksi Cepat
        </h3>

        <div class="grid grid-cols-1 gap-3">
            <?php if (isset($component)) { $__componentOriginalf98da62c3d69c08fb194bfa252612f17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98da62c3d69c08fb194bfa252612f17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-action-button','data' => ['label' => 'Tambah Portfolio','desc' => 'Upload karya terbaru','icon' => 'add_photo_alternate','color' => 'blue','route' => ''.e(route('admin.portfolio.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tambah Portfolio','desc' => 'Upload karya terbaru','icon' => 'add_photo_alternate','color' => 'blue','route' => ''.e(route('admin.portfolio.create')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $attributes = $__attributesOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $component = $__componentOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__componentOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalf98da62c3d69c08fb194bfa252612f17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98da62c3d69c08fb194bfa252612f17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-action-button','data' => ['label' => 'Buat Layanan','desc' => 'Tawarkan jasa baru','icon' => 'design_services','color' => 'green','route' => ''.e(route('admin.services.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Buat Layanan','desc' => 'Tawarkan jasa baru','icon' => 'design_services','color' => 'green','route' => ''.e(route('admin.services.create')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $attributes = $__attributesOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $component = $__componentOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__componentOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalf98da62c3d69c08fb194bfa252612f17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98da62c3d69c08fb194bfa252612f17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-action-button','data' => ['label' => 'Tulis Testimoni','desc' => 'Input manual ulasan','icon' => 'rate_review','color' => 'purple','route' => ''.e(route('admin.testimonials.create')).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Tulis Testimoni','desc' => 'Input manual ulasan','icon' => 'rate_review','color' => 'purple','route' => ''.e(route('admin.testimonials.create')).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $attributes = $__attributesOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $component = $__componentOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__componentOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>

            <?php if (isset($component)) { $__componentOriginalf98da62c3d69c08fb194bfa252612f17 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf98da62c3d69c08fb194bfa252612f17 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-action-button','data' => ['label' => 'Pengaturan Website','desc' => 'SEO & Konfigurasi','icon' => 'settings','color' => 'gray','route' => '#']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['label' => 'Pengaturan Website','desc' => 'SEO & Konfigurasi','icon' => 'settings','color' => 'gray','route' => '#']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $attributes = $__attributesOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__attributesOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf98da62c3d69c08fb194bfa252612f17)): ?>
<?php $component = $__componentOriginalf98da62c3d69c08fb194bfa252612f17; ?>
<?php unset($__componentOriginalf98da62c3d69c08fb194bfa252612f17); ?>
<?php endif; ?>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\homeputra-laravel\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>