<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames(([
'route' => '#',
'icon' => 'circle',
'label' => 'Link',
'active' => null,
'badge' => null
]));

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

foreach (array_filter(([
'route' => '#',
'icon' => 'circle',
'label' => 'Link',
'active' => null,
'badge' => null
]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$isActive = request()->routeIs($active ?? $route);

$bgClass = $isActive
? 'bg-gradient-to-r from-primary/20 to-transparent border-l-2 border-primary text-white shadow-[0_0_20px_rgba(255,178,4,0.1)]'
: 'text-gray-400 hover:text-white hover:bg-white/5 border-l-2 border-transparent';

$iconClass = $isActive
? 'text-primary'
: 'text-gray-500 group-hover:text-white';

// Handle # routes
$href = ($route === '#') ? '#' : route($route);
?>

<a href="<?php echo e($href); ?>"
    class="group flex items-center gap-3 px-4 py-3.5 mx-2 rounded-r-xl text-sm font-medium transition-all duration-300 relative overflow-hidden <?php echo e($bgClass); ?>">

    <?php if($isActive): ?>
    <div class="absolute inset-0 bg-primary/5 animate-pulse"></div>
    <?php endif; ?>

    <span class="material-symbols-outlined text-[22px] transition-colors relative z-10 <?php echo e($iconClass); ?>">
        <?php echo e($icon); ?>

    </span>

    <span class="relative z-10"><?php echo e($label); ?></span>

    <?php if($badge): ?>
    <span class="ml-auto px-2 py-0.5 rounded-full bg-red-500/20 text-red-400 text-[10px] font-bold border border-red-500/20">
        <?php echo e($badge); ?>

    </span>
    <?php endif; ?>
</a><?php /**PATH C:\laragon\www\homeputra-laravel\resources\views/components/admin-nav-link.blade.php ENDPATH**/ ?>