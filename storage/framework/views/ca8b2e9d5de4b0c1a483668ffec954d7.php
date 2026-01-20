

<?php $__env->startSection('title', 'Kelola Statistik'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-white">Statistik Landing Page</h2>
            <p class="text-gray-400 text-sm">Kelola angka statistik (Proyek Selesai, Pengalaman, dll) yang muncul di landing page.</p>
        </div>
        <button onclick="openAddModal()" class="inline-flex items-center gap-2 px-4 py-2 bg-primary hover:bg-primary-dark text-black font-bold rounded-lg transition-all">
            <span class="material-symbols-outlined text-sm">add</span>
            Tambah Statistik
        </button>
    </div>

    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-card-dark border border-white/5 rounded-2xl p-6 relative group overflow-hidden">
            <div class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full pointer-events-none group-hover:bg-primary/10 transition-all"></div>

            <div class="relative z-10">
                <div class="flex items-center justify-between mb-4">
                    <span class="text-[10px] uppercase tracking-widest text-gray-500 font-bold">Urutan: <?php echo e($stat->display_order); ?></span>
                    <div class="flex gap-2">
                        <button
                            onclick="openEditModal(this)"
                            data-id="<?php echo e($stat->id); ?>"
                            data-number="<?php echo e($stat->stat_number); ?>"
                            data-suffix="<?php echo e($stat->stat_suffix); ?>"
                            data-label="<?php echo e($stat->stat_label); ?>"
                            data-order="<?php echo e($stat->display_order); ?>"
                            class="p-2 bg-white/5 hover:bg-blue-500/20 text-blue-400 rounded-lg transition-all"
                            title="Edit">
                            <span class="material-symbols-outlined text-sm">edit</span>
                        </button>
                        <form action="<?php echo e(route('admin.statistics.destroy', $stat)); ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus statistik ini?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="p-2 bg-white/5 hover:bg-red-500/20 text-red-400 rounded-lg transition-all" title="Hapus">
                                <span class="material-symbols-outlined text-sm">delete</span>
                            </button>
                        </form>
                    </div>
                </div>

                <div class="flex items-baseline gap-1 mb-2">
                    <h3 class="text-4xl font-bold text-white font-serif"><?php echo e($stat->stat_number); ?></h3>
                    <span class="text-2xl text-primary font-serif italic"><?php echo e($stat->stat_suffix); ?></span>
                </div>
                <p class="text-gray-400 font-medium uppercase tracking-widest text-xs"><?php echo e($stat->stat_label); ?></p>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if($statistics->isEmpty()): ?>
    <div class="text-center py-20 bg-card-dark border border-dashed border-white/10 rounded-3xl">
        <span class="material-symbols-outlined text-6xl text-gray-700 mb-4">analytics</span>
        <h3 class="text-xl font-bold text-white mb-2">Belum ada statistik</h3>
        <p class="text-gray-500 mb-6">Klik tombol "Tambah Statistik" untuk mulai mengisi data.</p>
    </div>
    <?php endif; ?>
</div>


<div id="modal-add" class="fixed inset-0 z-100 items-center justify-center p-4 bg-black/80 backdrop-blur-sm hidden">
    <div class="bg-card-dark border border-white/10 rounded-3xl w-full max-w-md overflow-hidden animate-in fade-in zoom-in duration-300">
        <div class="p-6 border-b border-white/5 flex items-center justify-between bg-primary/5">
            <h3 class="text-xl font-bold text-white">Tambah Statistik</h3>
            <button onclick="document.getElementById('modal-add').classList.add('hidden')" class="text-gray-400 hover:text-white transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form action="<?php echo e(route('admin.statistics.store')); ?>" method="POST" class="p-6 space-y-4">
            <?php echo csrf_field(); ?>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Angka (Misal: 500)</label>
                <input type="text" name="stat_number" required class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Akhiran (Misal: +, Th, %)</label>
                <input type="text" name="stat_suffix" class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Label (Misal: Proyek Selesai)</label>
                <input type="text" name="stat_label" required class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Urutan Tampilan</label>
                <input type="number" name="display_order" value="0" class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modal-add').classList.add('hidden')" class="flex-1 py-3 border border-white/10 text-white font-bold rounded-xl hover:bg-white/5 transition-all">Batal</button>
                <button type="submit" class="flex-1 py-3 bg-primary text-black font-bold rounded-xl hover:bg-primary-dark transition-all shadow-lg shadow-primary/20">Simpan</button>
            </div>
        </form>
    </div>
</div>


<div id="modal-edit" class="fixed inset-0 z-100 items-center justify-center p-4 bg-black/80 backdrop-blur-sm hidden">
    <div class="bg-card-dark border border-white/10 rounded-3xl w-full max-w-md overflow-hidden animate-in fade-in zoom-in duration-300">
        <div class="p-6 border-b border-white/5 flex items-center justify-between bg-blue-500/5">
            <h3 class="text-xl font-bold text-white">Edit Statistik</h3>
            <button onclick="document.getElementById('modal-edit').classList.add('hidden')" class="text-gray-400 hover:text-white transition-colors">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <form id="form-edit" method="POST" class="p-6 space-y-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Angka</label>
                <input type="text" name="stat_number" id="edit-number" required class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Akhiran</label>
                <input type="text" name="stat_suffix" id="edit-suffix" class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Label</label>
                <input type="text" name="stat_label" id="edit-label" required class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-400 mb-1">Urutan Tampilan</label>
                <input type="number" name="display_order" id="edit-order" class="w-full bg-background-dark border border-white/10 rounded-xl px-4 py-2 text-white focus:border-primary outline-none transition-all">
            </div>
            <div class="flex gap-3 pt-2">
                <button type="button" onclick="document.getElementById('modal-edit').classList.add('hidden')" class="flex-1 py-3 border border-white/10 text-white font-bold rounded-xl hover:bg-white/5 transition-all">Batal</button>
                <button type="submit" class="flex-1 py-3 bg-blue-500 text-white font-bold rounded-xl hover:bg-blue-600 transition-all shadow-lg shadow-blue-500/20">Update</button>
            </div>
        </form>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script>
    function openEditModal(btn) {
        const id = btn.getAttribute('data-id');
        const number = btn.getAttribute('data-number');
        const suffix = btn.getAttribute('data-suffix');
        const label = btn.getAttribute('data-label');
        const order = btn.getAttribute('data-order');

        const form = document.getElementById('form-edit');
        form.action = `/admin/statistics/${id}`;

        document.getElementById('edit-number').value = number;
        document.getElementById('edit-suffix').value = suffix;
        document.getElementById('edit-label').value = label;
        document.getElementById('edit-order').value = order;

        const modal = document.getElementById('modal-edit');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Modal Add
    function openAddModal() {
        const modal = document.getElementById('modal-add');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    // Close on click outside
    window.onclick = function(event) {
        if (event.target.id.includes('modal')) {
            event.target.classList.add('hidden');
            event.target.classList.remove('flex');
        }
    }
</script>
<?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\homeputra-laravel\resources\views/admin/statistics/index.blade.php ENDPATH**/ ?>