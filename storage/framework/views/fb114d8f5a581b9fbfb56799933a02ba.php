<?php $__env->startSection('title', 'LaFamiglia808 | Studio di Produzione Musicale'); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* HERO */
    .hero-section {
        min-height: 100vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
    }
    .hero-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(220,38,38,0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(220,38,38,0.04) 1px, transparent 1px);
        background-size: 60px 60px;
        animation: gridPulse 8s ease-in-out infinite;
    }
    @keyframes gridPulse {
        0%,100% { opacity:0.4; }
        50% { opacity:0.8; }
    }
    .hero-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(4rem, 12vw, 10rem);
        line-height: 0.9;
        letter-spacing: -0.02em;
    }
    .hero-sub {
        font-family: 'JetBrains Mono', monospace;
        font-size: 0.75rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: #DC2626;
    }
    .hero-desc { color: #888; line-height: 1.7; max-width: 420px; }

    /* Floating particles */
    .particle {
        position: absolute;
        border-radius: 50%;
        background: #DC2626;
        opacity: 0.15;
        animation: float linear infinite;
    }
    @keyframes float {
        0% { transform: translateY(100vh) scale(0); opacity:0; }
        10% { opacity: 0.15; }
        90% { opacity: 0.15; }
        100% { transform: translateY(-100px) scale(1); opacity:0; }
    }

    /* Big 808 */
    .bg-808 {
        position: absolute;
        right: -5vw;
        top: 50%;
        transform: translateY(-50%);
        font-family: 'Bebas Neue', sans-serif;
        font-size: clamp(12rem, 30vw, 28rem);
        color: rgba(220,38,38,0.04);
        line-height: 1;
        user-select: none;
        pointer-events: none;
        white-space: nowrap;
    }

    /* Waveform */
    .waveform { display:flex; align-items:center; gap:3px; height:40px; }
    .wave-bar {
        width:3px;
        background:#DC2626;
        border-radius:2px;
        animation: wave 1.2s ease-in-out infinite;
    }
    @keyframes wave {
        0%,100% { height:8px; opacity:0.3; }
        50% { height:36px; opacity:1; }
    }

    /* Stats */
    .stat-block { border-left: 2px solid #DC2626; padding-left: 1.5rem; }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- ─── HERO ─────────────────────────────────────────────────────── -->
<section class="hero-section">
    <div class="hero-grid"></div>
    <div class="bg-808">808</div>

    <!-- Particles -->
    <?php $__currentLoopData = [['10%','15%','6px',4],['75%','25%','4px',6],['20%','70%','8px',8],['85%','60%','5px',3],['50%','80%','6px',7]]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="particle" style="left:<?php echo e($p[0]); ?>;top:<?php echo e($p[1]); ?>;width:<?php echo e($p[2]); ?>;height:<?php echo e($p[2]); ?>;animation-duration:<?php echo e($p[3]); ?>s;animation-delay:<?php echo e($p[3]*0.3); ?>s;"></div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <div class="max-w-7xl mx-auto px-6 relative z-10 py-24">
        <div class="max-w-3xl">
            <!-- Tag -->
            <div class="flex items-center gap-3 mb-8">
                <div class="waveform">
                    <?php $__currentLoopData = [0, 0.1, 0.2, 0.3, 0.4, 0.5, 0.4, 0.3, 0.2, 0.1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="wave-bar" style="animation-delay:<?php echo e($d); ?>s;"></div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <span class="hero-sub">CATANIA — Studio di Produzione</span>
            </div>

            <!-- Title -->
            <h1 class="hero-title text-white mb-2">
                <span class="block">LA</span>
                <span class="block" style="color:#DC2626;">FAMIGLIA</span>
                <span class="block text-white">808<span style="color:#DC2626;">'S</span></span>
            </h1>

            <!-- Sub -->
            <p class="hero-desc text-lg mt-8 mb-10">
                Beats che colpiscono. Sound che resta.<br>
                Produzione professionale per artisti che non accettano compromessi.
            </p>

            <!-- CTAs -->
            <div class="flex flex-wrap gap-4 mb-16">
                <a href="<?php echo e(route('services')); ?>" class="btn-red">Esplora Servizi</a>
                <a href="<?php echo e(route('portfolio')); ?>" class="btn-outline">Ascolta il Portfolio</a>
            </div>

            <!-- Stats -->
            <div class="grid grid-cols-3 gap-8">
                <div class="stat-block">
                    <div class="stat-number">100+</div>
                    <div class="font-mono text-xs tracking-widest uppercase" style="color:#888;">Beats Prodotti</div>
                </div>
                <div class="stat-block">
                    <div class="stat-number">50+</div>
                    <div class="font-mono text-xs tracking-widest uppercase" style="color:#888;">Artisti</div>
                </div>
                <div class="stat-block">
                    <div class="stat-number">5+</div>
                    <div class="font-mono text-xs tracking-widest uppercase" style="color:#888;">Anni di Exp.</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2">
        <span class="font-mono text-xs tracking-widest" style="color:#333;">SCROLL</span>
        <div style="width:1px;height:60px;background:linear-gradient(to bottom,#DC2626,transparent);"></div>
    </div>
</section>

<!-- ─── SERVICES PREVIEW ─────────────────────────────────────────── -->
<section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <p class="hero-sub mb-3 red-dot">Cosa facciamo</p>
                <h2 class="font-display text-5xl md:text-6xl text-white">SERVIZI</h2>
                <div class="red-line mt-4"></div>
            </div>
            <a href="<?php echo e(route('services')); ?>" class="btn-outline self-start md:self-auto">Vedi tutti →</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="card-hover p-8 relative overflow-hidden" style="background:#111;">
                <!-- Number -->
                <span class="absolute top-6 right-6 font-display text-5xl" style="color:#1A1A1A; line-height:1;">
                    <?php echo e(str_pad($loop->iteration, 2, '0', STR_PAD_LEFT)); ?>

                </span>

                <!-- Icon placeholder -->
                <div class="w-12 h-12 flex items-center justify-center mb-6 border border-gray-800">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                              d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"/>
                    </svg>
                </div>

                <h3 class="text-xl font-semibold text-white mb-3"><?php echo e($service->title); ?></h3>
                <p class="text-sm leading-relaxed mb-6" style="color:#888;"><?php echo e(Str::limit($service->description, 120)); ?></p>

                <?php if($service->price): ?>
                <div class="font-mono text-sm text-red-600"><?php echo e($service->price); ?></div>
                <?php endif; ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-span-3 text-center py-16" style="color:#444;">
                <p class="font-mono text-sm">Nessun servizio disponibile.</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ─── PORTFOLIO PREVIEW ────────────────────────────────────────── -->
<?php if($portfolio->count()): ?>
<section class="py-24 px-6" style="background:#0D0D0D;">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-6">
            <div>
                <p class="hero-sub mb-3 red-dot">I nostri lavori</p>
                <h2 class="font-display text-5xl md:text-6xl text-white">PORTFOLIO</h2>
                <div class="red-line mt-4"></div>
            </div>
            <a href="<?php echo e(route('portfolio')); ?>" class="btn-outline self-start md:self-auto">Vedi tutto →</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
            <?php $__currentLoopData = $portfolio; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="relative overflow-hidden group" style="aspect-ratio:1;">
                <!-- Cover -->
                <div class="absolute inset-0 flex items-center justify-center" style="background:#1A1A1A;">
                    <?php if($item->cover): ?>
                    <img src="<?php echo e(asset('storage/'.$item->cover)); ?>" alt="<?php echo e($item->title); ?>"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <?php else: ?>
                    <div class="w-full h-full flex items-center justify-center" style="background: linear-gradient(135deg, #1A1A1A 0%, #2A0A0A 100%);">
                        <span class="font-display text-6xl" style="color:#DC2626; opacity:0.3;">808</span>
                    </div>
                    <?php endif; ?>
                </div>

                <!-- Overlay -->
                <div class="absolute inset-0 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-all duration-300"
                     style="background: linear-gradient(to top, rgba(0,0,0,0.95) 0%, rgba(0,0,0,0.5) 60%, transparent 100%);">
                    <p class="font-mono text-xs tracking-widest text-red-600 mb-1"><?php echo e($item->genre ?? 'Beat'); ?></p>
                    <h3 class="font-display text-xl text-white"><?php echo e($item->title); ?></h3>
                    <?php if($item->artist): ?>
                    <p class="text-sm mt-1" style="color:#888;"><?php echo e($item->artist); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ─── REVIEWS ───────────────────────────────────────────────────── -->
<?php if($reviews->count()): ?>
<section class="py-24 px-6" style="background:#0D0D0D;">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-3 red-dot" style="display:inline-block;">Chi ci ha scelto</p>
            <h2 class="font-display text-5xl md:text-6xl text-white">RECENSIONI</h2>
            <div class="red-line mx-auto mt-4"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card-hover p-8 flex flex-col" style="background:#111;">
                <div class="flex gap-1 mb-4">
                    <?php for($i=0;$i<$review->rating;$i++): ?>
                    <span class="text-red-600">★</span>
                    <?php endfor; ?>
                    <?php for($i=$review->rating;$i<5;$i++): ?>
                    <span style="color:#2A2A2A;">★</span>
                    <?php endfor; ?>
                </div>
                <p class="text-sm leading-relaxed flex-1 mb-6" style="color:#888;">"<?php echo e($review->body); ?>"</p>
                <div>
                    <div class="font-semibold text-white text-sm"><?php echo e($review->name); ?></div>
                    <?php if($review->role): ?>
                    <div class="font-mono text-xs text-red-600 mt-1"><?php echo e($review->role); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ─── CTA BAND ──────────────────────────────────────────────────── -->
<section class="py-24 px-6 relative overflow-hidden">
    <div class="absolute inset-0" style="background: linear-gradient(135deg, #DC2626 0%, #7F1D1D 100%);"></div>
    <div class="hero-grid" style="opacity:0.1;"></div>
    <div class="max-w-4xl mx-auto text-center relative z-10">
        <p class="font-mono text-sm tracking-widest uppercase mb-4" style="color:rgba(255,255,255,0.6);">Pronto a fare musica seria?</p>
        <h2 class="font-display text-5xl md:text-7xl text-white mb-8">PARLIAMO.</h2>
        <a href="<?php echo e(route('contact')); ?>" class="inline-block px-12 py-4 font-mono text-sm tracking-widest uppercase text-red-600 bg-white hover:bg-gray-100 transition-colors">
            Contattaci →
        </a>
        <a href="<?php echo e(route('booking')); ?>" class="btn-outline" style="border-color:rgba(255,255,255,.4);color:#fff;margin-left:1rem;">
            Prenota Sessione
        </a>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/public/home.blade.php ENDPATH**/ ?>