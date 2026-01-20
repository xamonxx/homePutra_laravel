<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title', 'value', 'icon', 'color', 'route', 'trend', 'is_alert' => false]));

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

foreach (array_filter((['title', 'value', 'icon', 'color', 'route', 'trend', 'is_alert' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
$colors = [
'blue' => 'bg-blue-500/10 text-blue-400 group-hover:bg-blue-500/20 group-hover:text-blue-300',
'green' => 'bg-green-500/10 text-green-400 group-hover:bg-green-500/20 group-hover:text-green-300',
'purple' => 'bg-purple-500/10 text-purple-400 group-hover:bg-purple-500/20 group-hover:text-purple-300',
'orange' => 'bg-orange-500/10 text-orange-400 group-hover:bg-orange-500/20 group-hover:text-orange-300',
'gray' => 'bg-gray-500/10 text-gray-400 group-hover:bg-gray-500/20 group-hover:text-gray-300',
];
$btnColors = [
'blue' => 'text-blue-400 group-hover:translate-x-1',
'green' => 'text-green-400 group-hover:translate-x-1',
'purple' => 'text-purple-400 group-hover:translate-x-1',
'orange' => 'text-orange-400 group-hover:translate-x-1',
'gray' => 'text-gray-400 group-hover:translate-x-1',
];

$cls = $colors[$color] ?? $colors['gray'];
$btnCls = $btnColors[$color] ?? $btnColors['gray'];
$borderClass = $is_alert ? 'border-red-500/30 shadow-[0_0_15px_rgba(239,68,68,0.1)]' : 'border-white/5 hover:border-white/10';
?>

<div class="glass-card rounded-2xl p-6 border <?php echo e($borderClass); ?> relative group transition-all duration-300 hover:-translate-y-1">
    <div class="flex justify-between items-start mb-4">
        <div class="w-12 h-12 rounded-xl <?php echo e($cls); ?> flex items-center justify-center transition-colors">
            <span class="material-symbols-outlined text-2xl"><?php echo e($icon); ?></span>
        </div>
        <?php if($is_alert): ?>
        <span class="flex h-3 w-3 relative">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
        </span>
        <?php endif; ?>
    </div>

    <p class="text-gray-500 text-xs font-medium uppercase tracking-wider mb-1"><?php echo e($title); ?></p>
    <h3 class="text-3xl font-bold text-white mb-4"><?php echo e($value); ?></h3>

    <div class="flex items-center justify-between border-t border-white/5 pt-4">
        <span class="text-[10px] font-bold bg-white/5 px-2 py-1 rounded text-gray-400"><?php echo e($trend); ?></span>
        <a href="<?php echo e($route); ?>" class="text-xs font-bold flex items-center gap-1 transition-transform duration-300 <?php echo e($btnCls); ?>">
            DETAIL <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>
</div><?php /**PATH C:\laragon\www\homeputra-laravel\resources\views/components/admin-stat-card.blade.php ENDPATH**/ ?>