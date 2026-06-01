<?php $__env->startSection('title', 'Portfolio'); ?>
<?php $__env->startSection('page-title', 'Portfolio'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <p class="font-mono text-xs" style="color:#444;"><?php echo e($items->count()); ?> progetti totali</p>
    <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="btn-admin btn-primary">+ Nuovo Progetto</a>
</div>

<div class="admin-card">
    <?php if($items->count()): ?>
    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Artista</th>
                <th>Genere</th>
                <th>Anno</th>
                <th>Featured</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-white"><?php echo e($item->title); ?></td>
                <td><?php echo e($item->artist ?? '—'); ?></td>
                <td><?php echo e($item->genre ?? '—'); ?></td>
                <td class="font-mono text-xs"><?php echo e($item->year ?? '—'); ?></td>
                <td>
                    <span class="badge <?php echo e($item->featured ? 'badge-red' : 'badge-gray'); ?>">
                        <?php echo e($item->featured ? '★ Featured' : 'Normale'); ?>

                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.portfolio.edit', $item)); ?>" class="font-mono text-xs text-red-600 hover:text-red-500">Modifica</a>
                        <form action="<?php echo e(route('admin.portfolio.destroy', $item)); ?>" method="POST"
                              onsubmit="return confirm('Eliminare questo progetto?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="font-mono text-xs" style="color:#444; background:none; border:none; cursor:pointer;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun progetto. <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="text-red-600">Aggiungi →</a></p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/portfolio/index.blade.php ENDPATH**/ ?>