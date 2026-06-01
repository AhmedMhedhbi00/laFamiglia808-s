<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin'); ?> | LaFamiglia808</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=JetBrains+Mono:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background:#0A0A0A; color:#F5F5F5; font-family:'Space Grotesk',sans-serif; }
        ::-webkit-scrollbar { width:4px; }
        ::-webkit-scrollbar-thumb { background:#DC2626; }
        .sidebar-link {
            display:flex; align-items:center; gap:0.75rem;
            padding: 0.75rem 1rem;
            font-family:'JetBrains Mono',monospace;
            font-size:0.7rem;
            letter-spacing:0.15em;
            text-transform:uppercase;
            color:#888;
            border-left: 2px solid transparent;
            transition: all 0.2s;
        }
        .sidebar-link:hover, .sidebar-link.active {
            color:#F5F5F5;
            border-left-color: #DC2626;
            background: rgba(220,38,38,0.05);
        }
        .admin-card {
            background:#111;
            border:1px solid #1A1A1A;
            padding:1.5rem;
        }
        .form-input {
            width:100%;
            background:#0A0A0A;
            border:1px solid #2A2A2A;
            color:#F5F5F5;
            padding:0.75rem 1rem;
            font-family:'Space Grotesk',sans-serif;
            font-size:0.875rem;
            outline:none;
            transition: border-color 0.2s;
        }
        .form-input:focus { border-color:#DC2626; }
        .form-label {
            display:block;
            font-family:'JetBrains Mono',monospace;
            font-size:0.65rem;
            letter-spacing:0.15em;
            text-transform:uppercase;
            color:#888;
            margin-bottom:0.5rem;
        }
        .btn-admin {
            font-family:'JetBrains Mono',monospace;
            font-size:0.7rem;
            letter-spacing:0.12em;
            text-transform:uppercase;
            padding:0.6rem 1.25rem;
            cursor:pointer;
            border:none;
            transition:all 0.2s;
        }
        .btn-primary { background:#DC2626; color:#fff; }
        .btn-primary:hover { background:#B91C1C; }
        .btn-secondary { background:transparent; color:#888; border:1px solid #2A2A2A; }
        .btn-secondary:hover { border-color:#DC2626; color:#F5F5F5; }
        .btn-danger { background:transparent; color:#DC2626; border:1px solid #2A2A2A; }
        .btn-danger:hover { background:#DC2626; color:#fff; }
        table { width:100%; border-collapse:collapse; }
        th { font-family:'JetBrains Mono',monospace; font-size:0.65rem; letter-spacing:0.15em; text-transform:uppercase; color:#444; padding:0.75rem 1rem; text-align:left; border-bottom:1px solid #1A1A1A; }
        td { padding:0.875rem 1rem; border-bottom:1px solid #111; font-size:0.875rem; color:#888; }
        tr:hover td { background:rgba(220,38,38,0.03); color:#F5F5F5; }
        .badge { font-family:'JetBrains Mono',monospace; font-size:0.6rem; letter-spacing:0.1em; text-transform:uppercase; padding:0.25rem 0.6rem; }
        .badge-green { background:rgba(34,197,94,0.15); color:#4ADE80; }
        .badge-gray  { background:rgba(255,255,255,0.05); color:#666; }
        .badge-red   { background:rgba(220,38,38,0.15); color:#F87171; }
    </style>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>
<body>
<div class="flex h-screen overflow-hidden">

    <!-- SIDEBAR -->
    <aside class="w-60 flex-shrink-0 flex flex-col" style="background:#0D0D0D; border-right:1px solid #1A1A1A;">
        <!-- Logo -->
        <div class="px-6 py-5 flex items-center gap-3" style="border-bottom:1px solid #1A1A1A;">
            <span style="width:6px;height:6px;background:#DC2626;display:block;flex-shrink:0;"></span>
            <div>
                <div class="font-mono text-xs tracking-widest text-white">LAFAMIGLIA808</div>
                <div class="font-mono text-xs" style="color:#444; font-size:0.6rem; letter-spacing:0.1em;">ADMIN PANEL</div>
            </div>
        </div>

        <!-- Nav -->
        <nav class="flex-1 py-4 overflow-y-auto">
            <div class="px-4 mb-2">
                <span class="font-mono text-xs" style="color:#333; letter-spacing:0.15em; font-size:0.6rem;">MENU</span>
            </div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 21v-4a2 2 0 012-2h4a2 2 0 012 2v4"/></svg>
                Dashboard
            </a>
            <a href="<?php echo e(route('admin.services.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.services*') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2z"/></svg>
                Servizi
            </a>
            <a href="<?php echo e(route('admin.portfolio.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.portfolio*') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
                Portfolio
            </a>
            <a href="<?php echo e(route('admin.messages.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.messages*') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Messaggi
                <?php $unread = \App\Models\Message::where('read',false)->count(); ?>
                <?php if($unread > 0): ?>
                <span class="ml-auto text-xs px-2 py-0.5" style="background:#DC2626; color:#fff; border-radius:2px; font-family:'JetBrains Mono',monospace;"><?php echo e($unread); ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.bookings.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.bookings*') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Prenotazioni
                <?php $pending = \App\Models\Booking::where('status','pending')->count(); ?>
                <?php if($pending > 0): ?>
                <span class="ml-auto text-xs px-2 py-0.5" style="background:#DC2626; color:#fff; border-radius:2px; font-family:'JetBrains Mono',monospace;"><?php echo e($pending); ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo e(route('admin.reviews.index')); ?>" class="sidebar-link <?php echo e(request()->routeIs('admin.reviews*') ? 'active' : ''); ?>">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/></svg>
                Recensioni
            </a>

            <div class="px-4 mt-6 mb-2">
                <span class="font-mono text-xs" style="color:#333; letter-spacing:0.15em; font-size:0.6rem;">SITO</span>
            </div>
            <a href="<?php echo e(route('home')); ?>" target="_blank" class="sidebar-link">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Vai al Sito
            </a>
        </nav>

        <!-- Logout -->
        <div style="border-top:1px solid #1A1A1A;" class="p-4">
            <form action="<?php echo e(route('admin.logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="sidebar-link w-full text-left hover:text-red-600">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Bar -->
        <header class="flex items-center justify-between px-8 py-4 flex-shrink-0" style="background:#0D0D0D; border-bottom:1px solid #1A1A1A;">
            <h1 class="font-mono text-xs tracking-widest uppercase" style="color:#888;"><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h1>
            <span class="font-mono text-xs" style="color:#333;"><?php echo e(session('admin_email')); ?></span>
        </header>

        <!-- Flash Messages -->
        <?php if(session('success')): ?>
        <div class="mx-8 mt-6 px-6 py-3 font-mono text-xs text-green-400 flex items-center gap-2" style="background:rgba(34,197,94,0.1); border-left:2px solid #22C55E;">
            ✓ <?php echo e(session('success')); ?>

        </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
        <div class="mx-8 mt-6 px-6 py-3 font-mono text-xs text-red-400 flex items-center gap-2" style="background:rgba(220,38,38,0.1); border-left:2px solid #DC2626;">
            ✗ <?php echo e(session('error')); ?>

        </div>
        <?php endif; ?>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto px-8 py-8">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</div>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/layouts/admin.blade.php ENDPATH**/ ?>