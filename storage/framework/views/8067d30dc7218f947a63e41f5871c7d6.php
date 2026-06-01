<?php $__env->startSection('title', 'Prenotazioni'); ?>
<?php $__env->startSection('page-title', 'Prenotazioni'); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-card">
    <?php if($bookings->count()): ?>
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Servizio</th>
                <th>Data & Ora</th>
                <th>Durata</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $bookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <div class="text-white font-semibold text-sm"><?php echo e($booking->name); ?></div>
                    <div class="font-mono text-xs" style="color:#444;"><?php echo e($booking->email); ?></div>
                </td>
                <td class="text-sm"><?php echo e($booking->service?->title ?? '—'); ?></td>
                <td class="font-mono text-xs">
                    <?php echo e($booking->date->format('d/m/Y')); ?><br>
                    <span style="color:#888;"><?php echo e($booking->time); ?></span>
                </td>
                <td class="font-mono text-xs"><?php echo e($booking->duration); ?> min</td>
                <td>
                    <span class="badge <?php echo e($booking->status_color); ?>"><?php echo e($booking->status_label); ?></span>
                </td>
                <td>
                    <div class="flex items-center gap-3 flex-wrap">
                        <a href="<?php echo e(route('admin.bookings.show', $booking)); ?>" class="font-mono text-xs text-red-600 hover:text-red-500">Dettagli</a>
                        <?php if($booking->status === 'pending'): ?>
                        <form action="<?php echo e(route('admin.bookings.confirm', $booking)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#4ADE80;">Conferma</button>
                        </form>
                        <form action="<?php echo e(route('admin.bookings.cancel', $booking)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#F87171;">Annulla</button>
                        </form>
                        <?php endif; ?>
                        <form action="<?php echo e(route('admin.bookings.destroy', $booking)); ?>" method="POST" onsubmit="return confirm('Eliminare?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="mt-6"><?php echo e($bookings->links()); ?></div>
    <?php else: ?>
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessuna prenotazione ancora.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/bookings/index.blade.php ENDPATH**/ ?>