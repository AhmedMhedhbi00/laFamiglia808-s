@extends('layouts.app')
@section('title', 'Contatti | LaFamiglia808')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-24">

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

        <!-- Left Info -->
        <div>
            <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">Parliamo</p>
            <h1 class="font-display text-6xl md:text-8xl text-white mb-6">CONTATTI</h1>
            <div class="red-line mb-10"></div>

            <p class="text-lg leading-relaxed mb-12" style="color:#888;">
                Hai un progetto in mente? Vuoi prenotare una sessione?
                Scrivici — rispondiamo entro 24 ore.
            </p>

            <div class="space-y-8">
                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 border border-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-mono text-xs tracking-widest uppercase mb-1" style="color:#444;">Email</p>
                        <a href="mailto:info@lafamiglia808.com" class="text-white hover:text-red-600 transition-colors">info@lafamiglia808.com</a>
                    </div>
                </div>

                <div class="flex items-start gap-6">
                    <div class="w-12 h-12 border border-red-600 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-mono text-xs tracking-widest uppercase mb-1" style="color:#444;">Location</p>
                        <span class="text-white">Roma, Italia</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Form -->
        <div class="p-10 md:p-12" style="background:#111; border:1px solid #1A1A1A;">

            @if(session('success'))
            <div class="mb-8 px-6 py-4 font-mono text-sm text-green-400" style="background: rgba(34,197,94,0.1); border-left: 3px solid #22C55E;">
                {{ session('success') }}
            </div>
            @endif

            @if($errors->any())
            <div class="mb-8 px-6 py-4 font-mono text-sm text-red-400" style="background: rgba(220,38,38,0.1); border-left: 3px solid #DC2626;">
                @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Nome *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required
                               class="w-full px-4 py-3 text-sm text-white focus:outline-none transition-colors"
                               style="background:#0A0A0A; border:1px solid #2A2A2A; font-family:'Space Grotesk',sans-serif;"
                               onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                    </div>
                    <div>
                        <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Email *</label>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-3 text-sm text-white focus:outline-none transition-colors"
                               style="background:#0A0A0A; border:1px solid #2A2A2A; font-family:'Space Grotesk',sans-serif;"
                               onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                    </div>
                </div>

                <div>
                    <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Oggetto</label>
                    <input type="text" name="subject" value="{{ old('subject') }}"
                           class="w-full px-4 py-3 text-sm text-white focus:outline-none"
                           style="background:#0A0A0A; border:1px solid #2A2A2A; font-family:'Space Grotesk',sans-serif;"
                           onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">
                </div>

                <div>
                    <label class="block font-mono text-xs tracking-widest uppercase mb-2" style="color:#444;">Messaggio *</label>
                    <textarea name="message" rows="6" required
                              class="w-full px-4 py-3 text-sm text-white focus:outline-none resize-none"
                              style="background:#0A0A0A; border:1px solid #2A2A2A; font-family:'Space Grotesk',sans-serif;"
                              onfocus="this.style.borderColor='#DC2626'" onblur="this.style.borderColor='#2A2A2A'">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn-red w-full text-center">
                    Invia Messaggio →
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
