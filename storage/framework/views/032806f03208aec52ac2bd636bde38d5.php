<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | LaFamiglia808</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600&family=JetBrains+Mono:wght@400;700&family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body { background:#0A0A0A; color:#F5F5F5; font-family:'Space Grotesk',sans-serif; }
        .form-input {
            width:100%; background:#111; border:1px solid #2A2A2A;
            color:#F5F5F5; padding:0.875rem 1rem;
            font-family:'Space Grotesk',sans-serif; font-size:0.875rem;
            outline:none; transition:border-color 0.2s;
        }
        .form-input:focus { border-color:#DC2626; }
        .grid-bg {
            background-image: linear-gradient(rgba(220,38,38,0.04) 1px, transparent 1px),
                              linear-gradient(90deg, rgba(220,38,38,0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center grid-bg">

    <div class="w-full max-w-md px-6">
        <!-- Logo -->
        <div class="text-center mb-12">
            <div class="flex items-center justify-center gap-3 mb-2">
                <span style="width:8px;height:8px;background:#DC2626;display:block;"></span>
                <span style="font-family:'Bebas Neue',sans-serif; font-size:1.5rem; letter-spacing:0.2em; color:#fff;">LAFAMIGLIA808</span>
            </div>
            <p class="font-mono text-xs tracking-widest uppercase" style="color:#444;">Admin Panel</p>
        </div>

        <!-- Card -->
        <div class="p-10" style="background:#111; border:1px solid #1A1A1A;">
            <h2 class="font-mono text-xs tracking-widest uppercase mb-8" style="color:#888;">Accesso Riservato</h2>

            <?php if($errors->any()): ?>
            <div class="mb-6 px-4 py-3 font-mono text-xs text-red-400" style="background:rgba(220,38,38,0.1); border-left:2px solid #DC2626;">
                <?php echo e($errors->first()); ?>

            </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
            <div class="mb-6 px-4 py-3 font-mono text-xs text-green-400" style="background:rgba(34,197,94,0.1); border-left:2px solid #22C55E;">
                <?php echo e(session('success')); ?>

            </div>
            <?php endif; ?>

            <form action="<?php echo e(route('admin.login.post')); ?>" method="POST" class="space-y-5">
                <?php echo csrf_field(); ?>
                <div>
                    <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Email</label>
                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" required
                           class="form-input" placeholder="admin@lafamiglia808.com" autocomplete="email">
                </div>
                <div>
                    <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Password</label>
                    <input type="password" name="password" required class="form-input" autocomplete="current-password">
                </div>
                <button type="submit" class="w-full py-3 font-mono text-xs tracking-widest uppercase cursor-pointer transition-all"
                        style="background:#DC2626; color:#fff; border:1px solid #DC2626;"
                        onmouseover="this.style.background='transparent';this.style.color='#DC2626';"
                        onmouseout="this.style.background='#DC2626';this.style.color='#fff';">
                    Accedi →
                </button>
            </form>
        </div>

        <p class="text-center mt-6">
            <a href="<?php echo e(route('home')); ?>" class="font-mono text-xs tracking-widest" style="color:#333;">← Torna al sito</a>
        </p>
    </div>
</body>
</html>
<?php /**PATH /Applications/MAMP/htdocs/lafamiglia808/resources/views/admin/login.blade.php ENDPATH**/ ?>