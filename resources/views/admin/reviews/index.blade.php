@extends('layouts.admin')
@section('title', 'Recensioni')
@section('page-title', 'Recensioni')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="font-mono text-xs" style="color:#444;">{{ $reviews->count() }} recensioni</p>
    <a href="{{ route('admin.reviews.create') }}" class="btn-admin btn-primary">+ Nuova Recensione</a>
</div>

<div class="admin-card">
    @if($reviews->count())
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ruolo</th>
                <th>Rating</th>
                <th>Testo</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td class="text-white font-semibold">{{ $review->name }}</td>
                <td class="text-sm" style="color:#888;">{{ $review->role ?? '—' }}</td>
                <td class="font-mono text-xs text-red-600">
                    {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
                </td>
                <td class="text-sm" style="color:#888;">{{ Str::limit($review->body, 50) }}</td>
                <td>
                    <span class="badge {{ $review->active ? 'badge-green' : 'badge-gray' }}">
                        {{ $review->active ? 'Visibile' : 'Nascosta' }}
                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.reviews.edit', $review) }}" class="font-mono text-xs text-red-600 hover:text-red-500">Modifica</a>
                        <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('Eliminare?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessuna recensione. <a href="{{ route('admin.reviews.create') }}" class="text-red-600">Aggiungine una →</a></p>
    @endif
</div>
@endsection
