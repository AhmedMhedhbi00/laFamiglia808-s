@extends('layouts.app')
@section('title', 'Chi Siamo | LaFamiglia808')

@section('content')

<!-- Hero -->
<section class="py-32 px-6 relative overflow-hidden">
    <div class="absolute inset-0" style="background: radial-gradient(ellipse at 70% 50%, rgba(220,38,38,0.08) 0%, transparent 70%);"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="max-w-3xl">
            <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">La nostra storia</p>
            <h1 class="font-display text-6xl md:text-8xl text-white mb-8">CHI<br>SIAMO</h1>
            <div class="red-line mb-10"></div>
            <p class="text-lg leading-relaxed mb-6" style="color:#888;">
                LaFamiglia808 nasce dalla passione per il suono grezzo, il beat preciso e la musica fatta con intenzione.
                Siamo un collettivo di produttori, sound engineer e artisti basati a Roma, con una missione chiara:
                <span style="color:#F5F5F5;">creare musica che lascia il segno.</span>
            </p>
            <p class="text-lg leading-relaxed" style="color:#888;">
                Il nome parla chiaro — 808 è il cuore pulsante della musica moderna. La famiglia è il nostro modo di lavorare:
                nessun ego, solo risultati. Ogni progetto viene trattato come se fosse il nostro.
            </p>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-24 px-6" style="background:#0D0D0D;">
    <div class="max-w-7xl mx-auto">
        <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-12 red-dot">I nostri valori</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach([
                ['01', 'Qualità Prima di Tutto', 'Non usciamo nulla che non soddisfi i nostri standard. Ogni beat, ogni mix, ogni master viene lavorato finché non suona esattamente come deve.'],
                ['02', 'Collaborazione Vera', 'Non siamo una fabbrica di beat. Lavoriamo con te, capendo la tua visione e costruendo qualcosa insieme. La tua musica, il tuo suono.'],
                ['03', 'Innovazione Costante', 'Il panorama musicale cambia sempre. Noi restiamo al passo — nuove tecniche, nuovi suoni, nuove idee — senza dimenticare le radici.'],
            ] as $v)
            <div class="card-hover p-8" style="background:#111;">
                <span class="font-display text-5xl text-red-600 block mb-6" style="opacity:0.5;">{{ $v[0] }}</span>
                <h3 class="font-display text-2xl text-white mb-4">{{ $v[1] }}</h3>
                <p class="text-sm leading-relaxed" style="color:#888;">{{ $v[2] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Studio Setup -->
<section class="py-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div>
                <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">Il nostro setup</p>
                <h2 class="font-display text-5xl md:text-6xl text-white mb-8">STUDIO<br>& GEAR</h2>
                <div class="space-y-4">
                    @foreach([
                        'DAW', 'Ableton Live 12 / Logic Pro X',
                        'Monitoring', 'Yamaha HS8 + KRK Rokit 5',
                        'Preamp', 'Universal Audio Apollo X8',
                        'Microfoni', 'Neumann U87 + Shure SM7B',
                        'Controller', 'Akai MPC One + Maschine Studio',
                        'Plug-in', 'UAD, Waves, FabFilter, Valhalla',
                    ] as $i => $gear)
                    @if($i % 2 === 0)
                    <div class="flex items-center gap-4 py-3" style="border-bottom: 1px solid #1A1A1A;">
                        <span class="font-mono text-xs tracking-widest uppercase w-28" style="color:#444;">{{ $gear }}</span>
                    @else
                        <span class="text-sm text-white flex-1">{{ $gear }}</span>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="aspect-square flex items-center justify-center relative overflow-hidden" style="background:#111; border:1px solid #1A1A1A;">
                    <!-- Abstract visual -->
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg viewBox="0 0 400 400" class="w-3/4 h-3/4 opacity-20">
                            <circle cx="200" cy="200" r="180" fill="none" stroke="#DC2626" stroke-width="1"/>
                            <circle cx="200" cy="200" r="140" fill="none" stroke="#DC2626" stroke-width="0.5"/>
                            <circle cx="200" cy="200" r="100" fill="none" stroke="#DC2626" stroke-width="0.5"/>
                            <circle cx="200" cy="200" r="60" fill="none" stroke="#DC2626" stroke-width="1"/>
                            <line x1="200" y1="20" x2="200" y2="380" stroke="#DC2626" stroke-width="0.5"/>
                            <line x1="20" y1="200" x2="380" y2="200" stroke="#DC2626" stroke-width="0.5"/>
                            <circle cx="200" cy="200" r="8" fill="#DC2626"/>
                        </svg>
                    </div>
                    <span class="font-display text-9xl relative z-10" style="color:rgba(220,38,38,0.15);">808</span>
                </div>
                <div class="absolute -bottom-4 -right-4 w-32 h-32" style="background:#DC2626; z-index:-1;"></div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-24 px-6" style="background:#0D0D0D;">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="font-display text-5xl md:text-6xl text-white mb-6">PRONTO A<br>COLLABORARE?</h2>
        <p class="text-lg mb-10" style="color:#888;">Scrivici. Parliamo del tuo progetto.</p>
        <a href="{{ route('contact') }}" class="btn-red">Contattaci Ora</a>
    </div>
</section>

@endsection
