<?php $__env->startSection('title', 'Messaggi'); ?>
<?php $__env->startSection('page-title', 'Messaggi'); ?>

<?php $__env->startSection('content'); ?>
<div class="admin-card">
    <?php if($messages->count()): ?>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Oggetto</th>
                <th>Data</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="<?php echo e(!$msg->read ? 'text-white font-semibold' : ''); ?>"><?php echo e($msg->name); ?></td>
                <td><?php echo e($msg->email); ?></td>
                <td><?php echo e(Str::limit($msg->subject, 50)); ?></td>
                <td class="font-mono text-xs"><?php echo e($msg->created_at->format('d/m/Y H:i')); ?></td>
                <td>
                    <span class="badge <?php echo e($msg->read ? 'badge-gray' : 'badge-red'); ?>">
                        <?php echo e($msg->read ? 'Letto' : 'Nuovo'); ?>

                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="<?php echo e(route('admin.messages.show', $msg)); ?>" class="font-mono text-xs text-red-600 hover:text-red-500">Apri</a>
                        <form action="<?php echo e(route('admin.messages.read', $msg)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">
                                <?php echo e($msg->read ? 'Non letto' : 'Segna letto'); ?>

                            </button>
                        </form>
                        <form action="<?php echo e(route('admin.messages.destroy', $msg)); ?>" method="POST"
                              onsubmit="return confirm('Eliminare questo messaggio?')">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <div class="mt-6">
        <?php echo e($messages->links()); ?>

    </div>
    <?php else: ?>
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun messaggio ricevuto.</p>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/messages/index.blade.php ENDPATH**/ ?>