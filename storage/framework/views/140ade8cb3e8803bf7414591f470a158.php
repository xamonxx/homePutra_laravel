

<?php $__env->startSection('title', 'Portfolio Project - Home Putra Interior'); ?>

<?php $__env->startSection('content'); ?>
<div class="pt-32 pb-20 sm:pt-40 sm:pb-32 bg-background-dark min-h-screen">
    <div class="max-w-[1400px] mx-auto px-6">

        <!-- Header Section -->
        <div class="text-center mb-16 sm:mb-24" data-aos="fade-up">
            <span class="text-primary uppercase tracking-[0.4em] text-[10px] font-bold block mb-4">Karya Terbaik</span>
            <h1 class="text-4xl md:text-6xl lg:text-7xl text-white font-serif mb-6">Portfolio <span class="text-primary italic">Project</span></h1>
            <p class="text-gray-400 max-w-2xl mx-auto font-light leading-relaxed text-sm sm:text-base">
                Menampilkan koleksi lengkap karya desain interior kami yang menggabungkan estetika, fungsi, dan gaya hidup premium.
            </p>
        </div>

        <!-- Filter Buttons (Optional) -->
        <?php if($categories->count() > 0): ?>
        <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up" data-aos-delay="100">
            <a href="<?php echo e(route('portfolio.all')); ?>" class="px-6 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest font-bold transition-all <?php echo e(!$category ? 'bg-primary text-black border-primary' : 'text-gray-400 hover:text-white hover:border-white'); ?>">
                All
            </a>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('portfolio.all', ['category' => $cat])); ?>" class="px-6 py-2 rounded-full border border-white/10 text-xs uppercase tracking-widest font-bold transition-all <?php echo e($category == $cat ? 'bg-primary text-black border-primary' : 'text-gray-400 hover:text-white hover:border-white'); ?>">
                <?php echo e($cat); ?>

            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-16">
            <?php $__empty_1 = true; $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
            // Fallback images if image_url is missing
            $fallbackImages = [
            'https://images.unsplash.com/photo-1600210492486-724fe5c67fb0?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=800&q=80',
            'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=800&q=80',
            ];
            $imageSrc = $portfolio->image_url ?: $fallbackImages[$index % count($fallbackImages)];
            $delay = ($index % 3) * 100; // Stagger animation
            ?>
            <a href="<?php echo e(route('portfolio.show', $portfolio->id)); ?>" class="group relative overflow-hidden rounded-xl break-inside-avoid cursor-pointer card-hover" data-aos="fade-up" data-aos-delay="<?php echo e($delay); ?>">
                <!-- Image -->
                <div class="aspect-4/5 overflow-hidden">
                    <img alt="<?php echo e($portfolio->title); ?>" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="<?php echo e($imageSrc); ?>" loading="lazy" />
                </div>

                <!-- Overlay -->
                <div class="absolute inset-0 bg-linear-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-8">
                    <span class="text-primary text-[10px] uppercase tracking-[0.2em] font-bold mb-2 translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-100"><?php echo e($portfolio->category ?: 'Interior'); ?></span>
                    <h3 class="text-2xl text-white font-serif italic translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-200"><?php echo e($portfolio->title); ?></h3>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-full text-center py-20">
                <p class="text-gray-500 italic">Belum ada portfolio ditampilkan.</p>
            </div>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="flex justify-center" data-aos="fade-up">
            <?php echo e($portfolios->links('pagination::tailwind')); ?>

        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\homeputra-laravel\resources\views/frontend/portfolio-all.blade.php ENDPATH**/ ?>