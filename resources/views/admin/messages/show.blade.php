@extends('layouts.admin')
@section('title', 'Messaggio da ' . $message->name)
@section('page-title', 'Dettaglio Messaggio')

@section('content')
<div class="max-w-2xl">
    <div class="admin-card mb-4">
        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <div class="text-white font-semibold mb-1">{{ $message->name }}</div>
                    <a href="mailto:{{ $message->email }}" class="font-mono text-xs text-red-600 hover:text-red-500">{{ $message->email }}</a>
                </div>
                <div class="text-right">
                    <div class="font-mono text-xs mb-1" style="color:#444;">{{ $message->created_at->format('d/m/Y H:i') }}</div>
                    <span class="badge {{ $message->read ? 'badge-gray' : 'badge-red' }}">
                        {{ $message->read ? 'Letto' : 'Nuovo' }}
                    </span>
                </div>
            </div>

            <div style="border-top:1px solid #1A1A1A; padding-top:1rem;">
                <p class="font-mono text-xs uppercase tracking-widest mb-1" style="color:#444;">Oggetto</p>
                <p class="text-white">{{ $message->subject }}</p>
            </div>

            <div style="border-top:1px solid #1A1A1A; padding-top:1rem;">
                <p class="font-mono text-xs uppercase tracking-widest mb-3" style="color:#444;">Messaggio</p>
                <p class="text-sm leading-relaxed whitespace-pre-wrap" style="color:#ccc;">{{ $message->body }}</p>
            </div>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <a href="mailto:{{ $message->email }}" class="btn-admin btn-primary">Rispondi via Email</a>
        <a href="{{ route('admin.messages.index') }}" class="btn-admin btn-secondary">← Torna ai messaggi</a>
        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
              onsubmit="return confirm('Eliminare?')">
            @csrf @method('DELETE')
            <button type="submit" class="btn-admin btn-danger">Elimina</button>
        </form>
    </div>
</div>
@endsection
