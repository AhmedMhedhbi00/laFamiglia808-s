@extends('layouts.admin')
@section('title', 'Prenotazioni')
@section('page-title', 'Prenotazioni')

@section('content')
<div class="admin-card">
    @if($bookings->count())
    <table>
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Servizio</th>
                <th>Data & Ora</th>
                <th>Durata</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
            <tr>
                <td>
                    <div class="text-white font-semibold text-sm">{{ $booking->name }}</div>
                    <div class="font-mono text-xs" style="color:#444;">{{ $booking->email }}</div>
                </td>
                <td class="text-sm">{{ $booking->service?->title ?? '—' }}</td>
                <td class="font-mono text-xs">
                    {{ $booking->date->format('d/m/Y') }}<br>
                    <span style="color:#888;">{{ $booking->time }}</span>
                </td>
                <td class="font-mono text-xs">{{ $booking->duration }} min</td>
                <td>
                    <span class="badge {{ $booking->status_color }}">{{ $booking->status_label }}</span>
                </td>
                <td>
                    <div class="flex items-center gap-3 flex-wrap">
                        <a href="{{ route('admin.bookings.show', $booking) }}" class="font-mono text-xs text-red-600 hover:text-red-500">Dettagli</a>
                        @if($booking->status === 'pending')
                        <form action="{{ route('admin.bookings.confirm', $booking) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#4ADE80;">Conferma</button>
                        </form>
                        <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#F87171;">Annulla</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Eliminare?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-6">{{ $bookings->links() }}</div>
    @else
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessuna prenotazione ancora.</p>
    @endif
</div>
@endsection
