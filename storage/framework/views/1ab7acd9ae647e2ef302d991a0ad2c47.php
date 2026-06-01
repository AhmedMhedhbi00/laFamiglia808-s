<?php $__env->startSection('title', 'Prenotazione #' . $booking->id); ?>
<?php $__env->startSection('page-title', 'Dettaglio Prenotazione'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
    <div class="admin-card mb-4 space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-white font-semibold text-lg"><?php echo e($booking->name); ?></div>
                <a href="mailto:<?php echo e($booking->email); ?>" class="font-mono text-xs text-red-600"><?php echo e($booking->email); ?></a>
                <?php if($booking->phone): ?>
                <span class="font-mono text-xs ml-3" style="color:#444;"><?php echo e($booking->phone); ?></span>
                <?php endif; ?>
            </div>
            <span class="badge <?php echo e($booking->status_color); ?>"><?php echo e($booking->status_label); ?></span>
        </div>

        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;" class="grid grid-cols-2 gap-6">
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Data</p>
                <p class="text-white"><?php echo e($booking->date->format('d/m/Y')); ?></p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Orario</p>
                <p class="text-white"><?php echo e($booking->time); ?></p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Durata</p>
                <p class="text-white"><?php echo e($booking->duration); ?> minuti</p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Servizio</p>
                <p class="text-white"><?php echo e($booking->service?->title ?? '—'); ?></p>
            </div>
        </div>

        <?php if($booking->notes): ?>
        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;">
            <p class="font-mono text-xs uppercase tracking-widest mb-2" style="color:#444;">Note</p>
            <p class="text-sm leading-relaxed whitespace-pre-wrap" style="color:#ccc;"><?php echo e($booking->notes); ?></p>
        </div>
        <?php endif; ?>

        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;">
            <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Ricevuta il</p>
            <p class="font-mono text-xs" style="color:#888;"><?php echo e($booking->created_at->format('d/m/Y H:i')); ?></p>
        </div>
    </div>

    <div class="flex flex-wrap items-center gap-3">
        <?php if($booking->status === 'pending'): ?>
        <form action="<?php echo e(route('admin.bookings.confirm', $booking)); ?>" method="POST">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
            <button type="submit" class="btn-admin btn-primary">✓ Conferma</button>
        </form>
        <form action="<?php echo e(route('admin.bookings.cancel', $booking)); ?>" method="POST">
            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
            <button type="submit" class="btn-admin btn-danger">✕ Annulla</button>
        </form>
        <?php endif; ?>
        <a href="mailto:<?php echo e($booking->email); ?>" class="btn-admin btn-secondary">Scrivi al Cliente</a>
        <a href="<?php echo e(route('admin.bookings.index')); ?>" class="btn-admin btn-secondary">← Indietro</a>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/bookings/show.blade.php ENDPATH**/ ?>