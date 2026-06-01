<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>

<!-- Stats -->
<div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <?php $__currentLoopData = [
        ['Servizi',      $stats['services'],         'attivi',   '#DC2626'],
        ['Portfolio',    $stats['portfolio'],         'progetti', '#888'],
        ['Prenotazioni', $stats['pending_bookings'],  'in attesa',$stats['pending_bookings'] > 0 ? '#DC2626' : '#888'],
        ['Messaggi',     $stats['unread_messages'],   'non letti',$stats['unread_messages']  > 0 ? '#DC2626' : '#888'],
    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="admin-card relative overflow-hidden">
        <div class="text-3xl font-bold mb-1" style="color:<?php echo e($stat[3]); ?>; font-family:'JetBrains Mono',monospace;"><?php echo e($stat[0]); ?></div>
        <div class="text-2xl font-semibold text-white mb-1"><?php echo e($stat[1]); ?></div>
        <div class="font-mono text-xs uppercase tracking-widest" style="color:#444;"><?php echo e($stat[2]); ?></div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-6">
    <div class="admin-card">
        <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color:#444;">Azioni Rapide</p>
        <div class="flex flex-wrap gap-2">
            <a href="<?php echo e(route('admin.services.create')); ?>"  class="btn-admin btn-primary">+ Servizio</a>
            <a href="<?php echo e(route('admin.portfolio.create')); ?>" class="btn-admin btn-primary">+ Portfolio</a>
            <a href="<?php echo e(route('admin.reviews.create')); ?>"   class="btn-admin btn-primary">+ Recensione</a>
            <a href="<?php echo e(route('admin.bookings.index')); ?>"   class="btn-admin btn-secondary">Prenotazioni</a>
            <a href="<?php echo e(route('home')); ?>" target="_blank"   class="btn-admin btn-secondary">↗ Sito</a>
        </div>
    </div>
    <div class="admin-card">
        <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color:#444;">Statistiche</p>
        <div class="space-y-2">
            <?php $__currentLoopData = [
                ['Servizi attivi',    $stats['services']],
                ['Progetti portfolio',$stats['portfolio']],
                ['Recensioni',        $stats['reviews']],
                ['Prenotazioni totali',$stats['bookings']],
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex justify-between items-center py-1" style="border-bottom:1px solid #1A1A1A;">
                <span class="font-mono text-xs" style="color:#888;"><?php echo e($s[0]); ?></span>
                <span class="font-mono text-sm text-white"><?php echo e($s[1]); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="admin-card">
        <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color:#444;">Admin (.env)</p>
        <pre class="font-mono text-xs p-3" style="background:#0A0A0A;color:#888;border:1px solid #1A1A1A;overflow:auto;font-size:.6rem;">ADMIN_EMAIL=admin@lafamiglia808.com
ADMIN_PASSWORD=lafamiglia808

MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=tua@email.com
MAIL_PASSWORD=app_password</pre>
    </div>
</div>

<!-- Prenotazioni recenti -->
<div class="admin-card mb-6">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-mono text-xs tracking-widest uppercase" style="color:#444;">Prenotazioni Recenti</h3>
        <a href="<?php echo e(route('admin.bookings.index')); ?>" class="font-mono text-xs text-red-600">Vedi tutte →</a>
    </div>
    <?php if($recentBookings->count()): ?>
    <table>
        <thead><tr>
            <th>Cliente</th><th>Servizio</th><th>Data</th><th>Stato</th><th></th>
        </tr></thead>
        <tbody>
            <?php $__currentLoopData = $recentBookings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-white text-sm"><?php echo e($b->name); ?></td>
                <td class="text-sm"><?php echo e($b->service?->title ?? '—'); ?></td>
                <td class="font-mono text-xs"><?php echo e($b->date->format('d/m/Y')); ?> <?php echo e($b->time); ?></td>
                <td><span class="badge <?php echo e($b->status_color); ?>"><?php echo e($b->status_label); ?></span></td>
                <td><a href="<?php echo e(route('admin.bookings.show', $b)); ?>" class="font-mono text-xs text-red-600">Apri</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="font-mono text-xs py-4" style="color:#333;">Nessuna prenotazione ancora.</p>
    <?php endif; ?>
</div>

<!-- Messaggi recenti -->
<div class="admin-card">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-mono text-xs tracking-widest uppercase" style="color:#444;">Messaggi Recenti</h3>
        <a href="<?php echo e(route('admin.messages.index')); ?>" class="font-mono text-xs text-red-600">Vedi tutti →</a>
    </div>
    <?php if($recentMessages->count()): ?>
    <table>
        <thead><tr><th>Nome</th><th>Oggetto</th><th>Data</th><th>Stato</th><th></th></tr></thead>
        <tbody>
            <?php $__currentLoopData = $recentMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $msg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="<?php echo e(!$msg->read ? 'text-white font-semibold' : ''); ?> text-sm"><?php echo e($msg->name); ?></td>
                <td class="text-sm"><?php echo e(Str::limit($msg->subject, 40)); ?></td>
                <td class="font-mono text-xs"><?php echo e($msg->created_at->format('d/m/Y')); ?></td>
                <td><span class="badge <?php echo e($msg->read ? 'badge-gray' : 'badge-red'); ?>"><?php echo e($msg->read ? 'Letto' : 'Nuovo'); ?></span></td>
                <td><a href="<?php echo e(route('admin.messages.show', $msg)); ?>" class="font-mono text-xs text-red-600">Apri</a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php else: ?>
    <p class="font-mono text-xs py-4" style="color:#333;">Nessun messaggio ancora.</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>