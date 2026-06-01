@extends('layouts.admin')
@section('title', 'Prenotazione #' . $booking->id)
@section('page-title', 'Dettaglio Prenotazione')

@section('content')
<div class="max-w-2xl">
    <div class="admin-card mb-4 space-y-5">
        <div class="flex items-center justify-between">
            <div>
                <div class="text-white font-semibold text-lg">{{ $booking->name }}</div>
                <a href="mailto:{{ $booking->email }}" class="font-mono text-xs text-red-600">{{ $booking->email }}</a>
                @if($booking->phone)
                <span class="font-mono text-xs ml-3" style="color:#444;">{{ $booking->phone }}</span>
                @endif
            </div>
            <span class="badge {{ $booking->status_color }}">{{ $booking->status_label }}</span>
        </div>

        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;" class="grid grid-cols-2 gap-6">
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Data</p>
                <p class="text-white">{{ $booking->date->format('d/m/Y') }}</p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Orario</p>
                <p class="text-white">{{ $booking->time }}</p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Durata</p>
                <p class="text-white">{{ $booking->duration }} minuti</p>
            </div>
            <div>
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Servizio</p>
                <p class="text-white">{{ $booking->service?->title ?? '—' }}</p>
            </div>
        </div>

        @if($booking->notes)
        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;">
            <p class="font-mono text-xs uppercase tracking-widest mb-2" style="color:#444;">Note</p>
            <p class="text-sm leading-relaxed whitespace-pre-wrap" style="color:#ccc;">{{ $booking->notes }}</p>
        </div>
        @endif

        <div style="border-top:1px solid #1A1A1A;padding-top:1rem;">
            <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Ricevuta il</p>
            <p class="font-mono text-xs" style="color:#888;">{{ $booking->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <div class="flex flex-wrap items-center gap-3">
        @if($booking->status === 'pending')
        <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST">
            @csrf @method('PATCH')
            <button type="submit" class="btn-admin btn-primary">✓ Conferma</button>
        </form>
        <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST">
            @csrf @method('PATCH')
            <button type="submit" class="btn-admin btn-danger">✕ Annulla</button>
        </form>
        @endif
        <a href="mailto:{{ $booking->email }}" class="btn-admin btn-secondary">Scrivi al Cliente</a>
        <a href="{{ route('admin.bookings.index') }}" class="btn-admin btn-secondary">← Indietro</a>
    </div>
</div>
@endsection
