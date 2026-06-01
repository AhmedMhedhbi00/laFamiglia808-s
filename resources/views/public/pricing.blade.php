@extends('layouts.app')
@section('title', 'Prezzi | LaFamiglia808')

@section('content')

<!-- Header -->
<div class="max-w-7xl mx-auto px-6 py-24">
    <div class="text-center mb-20">
        <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot" style="display:inline-block;">Trasparenza totale</p>
        <h1 class="font-display text-6xl md:text-8xl text-white mb-6">PREZZI</h1>
        <div class="red-line mx-auto"></div>
        <p class="mt-6 text-lg max-w-xl mx-auto" style="color:#888;">
            Nessuna sorpresa. Prezzi chiari, qualità garantita.
        </p>
    </div>

    <!-- Packages Grid -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-24">

        <!-- Starter -->
        <div class="card-hover p-10 flex flex-col" style="background:#111;">
            <div class="mb-8">
                <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-3">Starter</p>
                <div class="font-display text-6xl text-white mb-1">€150</div>
                <p class="text-sm" style="color:#888;">una tantum</p>
            </div>
            <ul class="space-y-3 mb-10 flex-1">
                @foreach(['1 Beat personalizzato','2 revisioni incluse','File WAV + MP3','Consegna in 5 giorni','Licenza per uso non commerciale'] as $feat)
                <li class="flex items-center gap-3 text-sm" style="color:#ccc;">
                    <span class="text-red-600 flex-shrink-0">→</span>{{ $feat }}
                </li>
                @endforeach
            </ul>
            <a href="{{ route('booking') }}" class="btn-outline text-center">Prenota →</a>
        </div>

        <!-- Pro — highlighted -->
        <div class="p-10 flex flex-col relative overflow-hidden" style="background:#DC2626; border:1px solid #DC2626;">
            <span class="absolute top-4 right-4 font-mono text-xs tracking-widest uppercase px-3 py-1" style="background:rgba(0,0,0,.3); color:#fff;">Più scelto</span>
            <div class="mb-8">
                <p class="font-mono text-xs tracking-widest uppercase mb-3" style="color:rgba(255,255,255,.7);">Pro</p>
                <div class="font-display text-6xl text-white mb-1">€350</div>
                <p class="text-sm" style="color:rgba(255,255,255,.6);">una tantum</p>
            </div>
            <ul class="space-y-3 mb-10 flex-1">
                @foreach(['3 Beat personalizzati','Revisioni illimitate','Mixing professionale','File multitracking','Consegna in 7 giorni','Licenza commerciale completa','Supporto WhatsApp diretto'] as $feat)
                <li class="flex items-center gap-3 text-sm text-white">
                    <span style="color:rgba(255,255,255,.7);" class="flex-shrink-0">→</span>{{ $feat }}
                </li>
                @endforeach
            </ul>
            <a href="{{ route('booking') }}" class="text-center py-3 font-mono text-xs tracking-widest uppercase bg-white text-red-600 hover:bg-gray-100 transition-colors block">Prenota →</a>
        </div>

        <!-- Studio Full Day -->
        <div class="card-hover p-10 flex flex-col" style="background:#111;">
            <div class="mb-8">
                <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-3">Studio Day</p>
                <div class="font-display text-6xl text-white mb-1">€500</div>
                <p class="text-sm" style="color:#888;">giornata intera</p>
            </div>
            <ul class="space-y-3 mb-10 flex-1">
                @foreach(['8h in studio','Tecnico del suono dedicato','Registrazione + Mixing','Mastering incluso','Beat personalizzati illimitati','File in tutti i formati','Licenza commerciale totale','Follow-up post-sessione'] as $feat)
                <li class="flex items-center gap-3 text-sm" style="color:#ccc;">
                    <span class="text-red-600 flex-shrink-0">→</span>{{ $feat }}
                </li>
                @endforeach
            </ul>
            <a href="{{ route('booking') }}" class="btn-outline text-center">Prenota →</a>
        </div>
    </div>

    <!-- Singoli Servizi -->
    <div class="mb-24">
        <h2 class="font-display text-4xl text-white mb-3">SERVIZI SINGOLI</h2>
        <div class="red-line mb-12"></div>
        <div class="space-y-3">
            @forelse($services as $service)
            <div class="flex items-center justify-between p-6 card-hover" style="background:#111;">
                <div>
                    <h3 class="text-white font-semibold mb-1">{{ $service->title }}</h3>
                    <p class="text-sm" style="color:#888;">{{ Str::limit($service->description, 80) }}</p>
                </div>
                <div class="text-right flex-shrink-0 ml-8">
                    @if($service->price)
                    <div class="font-mono text-lg text-red-600">{{ $service->price }}</div>
                    @endif
                    <a href="{{ route('booking') }}" class="font-mono text-xs text-red-600 hover:text-red-500 transition-colors">Prenota →</a>
                </div>
            </div>
            @empty
            <p class="font-mono text-xs" style="color:#444;">Prezzi in aggiornamento.</p>
            @endforelse
        </div>
    </div>

    <!-- FAQ -->
    <div>
        <h2 class="font-display text-4xl text-white mb-3">FAQ</h2>
        <div class="red-line mb-12"></div>
        <div class="space-y-4" x-data="{open: null}">
            @foreach([
                ['Come funziona il processo?', 'Prenoti online, ti contattiamo entro 24h per confermare. Il giorno della sessione arrivi in studio e lavoriamo insieme. Pagamento in loco.'],
                ['Posso portare i miei strumenti?', 'Assolutamente sì. Abbiamo anche una postazione per basso, chitarra e tastiere, ma sentiti libero di portare il tuo gear.'],
                ['Cosa include la licenza commerciale?', 'Puoi usare il materiale prodotto per pubblicarlo su tutte le piattaforme streaming, social media e per uso commerciale senza royalty aggiuntive.'],
                ['Posso avere un preventivo personalizzato?', 'Certo. Scrivici tramite il modulo contatti e ti prepariamo un preventivo su misura per il tuo progetto.'],
                ['Come si paga?', 'Accettiamo contanti, bonifico bancario e carte di credito/debito. Per i pacchetti è richiesto un acconto del 30% alla prenotazione.'],
            ] as $i => $faq)
            <div class="card-hover" style="background:#111;" x-data="{open: false}">
                <button @click="open = !open" class="w-full flex items-center justify-between p-6 text-left">
                    <span class="text-white font-medium">{{ $faq[0] }}</span>
                    <span class="text-red-600 font-mono text-lg flex-shrink-0 ml-4" x-text="open ? '−' : '+'"></span>
                </button>
                <div x-show="open" x-collapse class="px-6 pb-6">
                    <p class="text-sm leading-relaxed" style="color:#888;">{{ $faq[1] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Bottom CTA -->
<section class="py-20 px-6 relative overflow-hidden">
    <div class="absolute inset-0" style="background:linear-gradient(135deg,#DC2626 0%,#7F1D1D 100%);"></div>
    <div class="max-w-4xl mx-auto text-center relative z-10">
        <h2 class="font-display text-5xl md:text-6xl text-white mb-6">HAI DOMANDE?</h2>
        <p class="text-lg mb-8" style="color:rgba(255,255,255,.7);">Scrivici, ti rispondiamo entro 24 ore.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('contact') }}" class="inline-block px-10 py-4 font-mono text-sm tracking-widest uppercase bg-white text-red-600 hover:bg-gray-100 transition-colors">Contattaci</a>
            <a href="{{ route('booking') }}" class="btn-outline" style="border-color:rgba(255,255,255,.3);color:#fff;">Prenota Ora →</a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
// x-collapse polyfill semplice per Alpine
document.addEventListener('alpine:init', () => {
    Alpine.directive('collapse', (el, { expression }, { evaluate }) => {});
});
</script>
@endpush
