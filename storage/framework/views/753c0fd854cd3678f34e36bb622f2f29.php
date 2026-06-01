<?php $__env->startSection('title', 'Servizi'); ?>
<?php $__env->startSection('page-title', 'Servizi'); ?>

<?php $__env->startSection('content'); ?>
<div class="flex items-center justify-between mb-6">
    <p class="font-mono text-xs" style="color:#444;"><?php echo e($services->count()); ?> servizi totali</p>
    <a href="<?php echo e(route('admin.services.create')); ?>" class="btn-admin btn-primary">+ Nuovo Servizio</a>
</div>

<div class="admin-card">
    <?php if($services->count()): ?>
    <table>
        <thead>
            <tr>
                <th>Ordine</th>
                <th>Titolo</th>
                <th>Prezzo</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="font-mono text-xs" style="color:#444;"><?php echo e($service->order); ?></td>
                <td class="text-white"><?php echo e($service->title); ?></td>
                <td class="font-mono text-xs"><?php echo e($service->price ?? '—'); ?></td>
                <td>
                    <span class="badge <?php echo e($service->active ? 'badge-green' : 'badge-gray'); ?>">
                        <?php echo e($service->active ? 'Attivo' : 'Nascosto'); ?>

                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.services.edit', $service)); ?>" class="font-mono text-xs text-red-600 hover:text-red-500">Modifica</a>
                        <form action="<?php echo e(route('admin.services.destroy', $service)); ?>" method="POST"
                              onsubmit="return confirm('Eliminare questo servizio?')">
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
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun servizio. <a href="<?php echo e(route('admin.services.create')); ?>" class="text-red-600">Creane uno →</a></p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/services/index.blade.php ENDPATH**/ ?>