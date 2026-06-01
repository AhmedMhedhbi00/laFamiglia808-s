<?php $__env->startSection('title', 'Servizi | LaFamiglia808'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-24">

    <!-- Header -->
    <div class="mb-20">
        <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">Cosa offriamo</p>
        <h1 class="font-display text-6xl md:text-8xl text-white mb-6">SERVIZI</h1>
        <div class="red-line"></div>
        <p class="mt-6 text-lg max-w-xl" style="color:#888;">
            Ogni progetto è unico. Lavoriamo con te per costruire il suono che hai in testa.
        </p>
    </div>

    <!-- Services Grid -->
    <div class="space-y-6">
        <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="card-hover p-10 md:p-12 relative overflow-hidden flex flex-col md:flex-row md:items-start gap-8" style="background:#111;">
            <!-- Number -->
            <span class="font-display text-7xl md:text-9xl" style="color:#1A1A1A; line-height:1; min-width:120px; text-align:right;">
                <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?>

            </span>

            <div class="flex-1">
                <div class="flex items-start justify-between flex-wrap gap-4 mb-4">
                    <h2 class="font-display text-3xl md:text-4xl text-white"><?php echo e($service->title); ?></h2>
                    <?php if($service->price): ?>
                    <span class="font-mono text-sm px-4 py-2 border border-red-600 text-red-600"><?php echo e($service->price); ?></span>
                    <?php endif; ?>
                </div>
                <p class="text-base leading-relaxed" style="color:#888;"><?php echo e($service->description); ?></p>
                <div class="mt-8">
                    <a href="<?php echo e(route('contact')); ?>" class="btn-red">Prenota →</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="text-center py-24" style="color:#444;">
            <p class="font-mono text-sm">Servizi in arrivo. Torna presto.</p>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/public/services.blade.php ENDPATH**/ ?>