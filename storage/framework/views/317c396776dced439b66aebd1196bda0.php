<?php $__env->startSection('title', 'Prenota una Sessione | LaFamiglia808'); ?>

<?php $__env->startPush('styles'); ?>
<style>
.time-slot {
    font-family:'JetBrains Mono',monospace;
    font-size:.75rem;
    padding:.5rem .75rem;
    border:1px solid #2A2A2A;
    cursor:pointer;
    transition:all .2s;
    background:transparent;
    color:#888;
}
.time-slot:hover, .time-slot.selected {
    border-color:#DC2626;
    color:#fff;
    background:rgba(220,38,38,.1);
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-6 py-24">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

        <!-- Left -->
        <div>
            <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">Prenota</p>
            <h1 class="font-display text-6xl md:text-7xl text-white mb-6">BOOK A<br>SESSION</h1>
            <div class="red-line mb-10"></div>
            <p class="text-lg leading-relaxed mb-12" style="color:#888;">
                Compila il form per prenotare la tua sessione. Ti risponderemo entro 24 ore per confermare disponibilità e dettagli.
            </p>

            <!-- Info boxes -->
            <div class="space-y-4">
                <?php $__currentLoopData = [
                    ['📅', 'Disponibilità', 'Lun–Sab, 10:00–22:00'],
                    ['⏱', 'Durata minima', '1 ora di sessione'],
                    ['✉️', 'Risposta', 'Entro 24 ore dalla richiesta'],
                    ['💳', 'Pagamento', 'In studio il giorno della sessione'],
                ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-center gap-4 p-4" style="background:#111; border:1px solid #1A1A1A;">
                    <span class="text-2xl"><?php echo e($info[0]); ?></span>
                    <div>
                        <div class="font-mono text-xs tracking-widest uppercase mb-1" style="color:#444;"><?php echo e($info[1]); ?></div>
                        <div class="text-sm text-white"><?php echo e($info[2]); ?></div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <!-- Form -->
        <div class="p-10" style="background:#111; border:1px solid #1A1A1A;">

            <?php if(session('success')): ?>
            <div class="mb-6 px-5 py-4 font-mono text-sm text-green-400" style="background:rgba(34,197,94,.1);border-left:3px solid #22C55E;">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
            <div class="mb-6 px-5 py-4 font-mono text-sm text-red-400" style="background:rgba(220,38,38,.1);border-left:3px solid #DC2626;">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><p><?php echo e($e); ?></p><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('booking.store')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Nome *</label>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>" required
                               class="w-full px-4 py-3 text-sm text-white"
                               style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                               onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                    </div>
                    <div>
                        <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Telefono</label>
                        <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>"
                               class="w-full px-4 py-3 text-sm text-white"
                               style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                               onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                    </div>
                </div>

                <div>
                    <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Email *</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                           class="w-full px-4 py-3 text-sm text-white"
                           style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                           onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                </div>

                <div>
                    <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Servizio</label>
                    <select name="service_id"
                            class="w-full px-4 py-3 text-sm text-white"
                            style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                            onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                        <option value="">— Seleziona un servizio —</option>
                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($service->id); ?>" <?php echo e(old('service_id') == $service->id ? 'selected' : ''); ?>>
                            <?php echo e($service->title); ?><?php echo e($service->price ? ' ('.$service->price.')' : ''); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Data *</label>
                        <input type="date" name="date" value="<?php echo e(old('date')); ?>" required
                               min="<?php echo e(date('Y-m-d', strtotime('+1 day'))); ?>"
                               class="w-full px-4 py-3 text-sm text-white"
                               style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                               onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                    </div>
                    <div>
                        <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Orario *</label>
                        <select name="time" required
                                class="w-full px-4 py-3 text-sm text-white"
                                style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                                onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                            <option value="">— Orario —</option>
                            <?php $__currentLoopData = ['10:00','11:00','12:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($t); ?>" <?php echo e(old('time') == $t ? 'selected' : ''); ?>><?php echo e($t); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Durata (minuti) *</label>
                    <select name="duration"
                            class="w-full px-4 py-3 text-sm text-white"
                            style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                            onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                        <option value="60" <?php echo e(old('duration','60')=='60'?'selected':''); ?>>1 ora</option>
                        <option value="120" <?php echo e(old('duration')=='120'?'selected':''); ?>>2 ore</option>
                        <option value="180" <?php echo e(old('duration')=='180'?'selected':''); ?>>3 ore</option>
                        <option value="240" <?php echo e(old('duration')=='240'?'selected':''); ?>>4 ore (mezza giornata)</option>
                        <option value="480" <?php echo e(old('duration')=='480'?'selected':''); ?>>8 ore (giornata intera)</option>
                    </select>
                </div>

                <div>
                    <label class="form-label" style="display:block;font-family:'JetBrains Mono',monospace;font-size:.65rem;letter-spacing:.15em;text-transform:uppercase;color:#444;margin-bottom:.5rem;">Note aggiuntive</label>
                    <textarea name="notes" rows="4"
                              class="w-full px-4 py-3 text-sm text-white resize-none"
                              style="background:#0A0A0A;border:1px solid #2A2A2A;font-family:'Space Grotesk',sans-serif;outline:none;"
                              onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'"
                              placeholder="Raccontaci il tuo progetto, strumenti che porti, genere musicale..."><?php echo e(old('notes')); ?></textarea>
                </div>

                <button type="submit" class="btn-red w-full text-center">Invia Richiesta →</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/public/booking.blade.php ENDPATH**/ ?>