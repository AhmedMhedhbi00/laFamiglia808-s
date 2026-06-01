<?php $__env->startSection('title', $item->id ? 'Modifica Progetto' : 'Nuovo Progetto'); ?>
<?php $__env->startSection('page-title', $item->id ? 'Modifica Progetto' : 'Nuovo Progetto'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl">
    <form action="<?php echo e($item->id ? route('admin.portfolio.update', $item) : route('admin.portfolio.store')); ?>"
          method="POST" enctype="multipart/form-data" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php if($item->id): ?> <?php echo method_field('PUT'); ?> <?php endif; ?>

        <div class="admin-card space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Titolo *</label>
                    <input type="text" name="title" value="<?php echo e(old('title', $item->title)); ?>" required class="form-input">
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><p class="mt-1 text-xs text-red-500"><?php echo e($message); ?></p><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div>
                    <label class="form-label">Artista</label>
                    <input type="text" name="artist" value="<?php echo e(old('artist', $item->artist)); ?>" class="form-input">
                </div>
            </div>

            <div>
                <label class="form-label">Descrizione</label>
                <textarea name="description" rows="4" class="form-input resize-none"><?php echo e(old('description', $item->description)); ?></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Genere</label>
                    <input type="text" name="genre" value="<?php echo e(old('genre', $item->genre)); ?>" class="form-input" placeholder="Trap, Hip-Hop...">
                </div>
                <div>
                    <label class="form-label">Anno</label>
                    <input type="number" name="year" value="<?php echo e(old('year', $item->year)); ?>" class="form-input" min="2000" max="2099" placeholder="<?php echo e(date('Y')); ?>">
                </div>
            </div>

            <div>
                <label class="form-label">Spotify URL</label>
                <input type="url" name="spotify_url" value="<?php echo e(old('spotify_url', $item->spotify_url)); ?>" class="form-input" placeholder="https://open.spotify.com/...">
            </div>
            <div>
                <label class="form-label">YouTube URL</label>
                <input type="url" name="youtube_url" value="<?php echo e(old('youtube_url', $item->youtube_url)); ?>" class="form-input" placeholder="https://youtube.com/...">
            </div>
            <div>
                <label class="form-label">SoundCloud URL</label>
                <input type="url" name="soundcloud_url" value="<?php echo e(old('soundcloud_url', $item->soundcloud_url)); ?>" class="form-input" placeholder="https://soundcloud.com/...">
            </div>

            <div>
                <label class="form-label">Cover (immagine)</label>
                <?php if($item->cover): ?>
                <div class="mb-3">
                    <img src="<?php echo e(asset('storage/'.$item->cover)); ?>" alt="Cover attuale" class="w-24 h-24 object-cover" style="border:1px solid #2A2A2A;">
                    <p class="font-mono text-xs mt-1" style="color:#444;">Cover attuale — carica un'altra per sostituirla</p>
                </div>
                <?php endif; ?>
                <input type="file" name="cover" accept="image/*" class="form-input" style="padding:0.5rem;">
            </div>

            <div class="flex items-center gap-3">
                <input type="hidden" name="featured" value="0">
                <input type="checkbox" name="featured" value="1" id="featured"
                       <?php echo e(old('featured', $item->featured ?? false) ? 'checked' : ''); ?>

                       class="w-4 h-4 cursor-pointer" style="accent-color:#DC2626;">
                <label for="featured" class="font-mono text-xs tracking-widest uppercase cursor-pointer" style="color:#888;">Metti in evidenza (featured) nella home</label>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-admin btn-primary">
                <?php echo e($item->id ? 'Aggiorna' : 'Aggiungi Progetto'); ?>

            </button>
            <a href="<?php echo e(route('admin.portfolio.index')); ?>" class="btn-admin btn-secondary">Annulla</a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/portfolio/form.blade.php ENDPATH**/ ?>