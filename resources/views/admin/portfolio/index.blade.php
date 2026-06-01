@extends('layouts.admin')
@section('title', 'Portfolio')
@section('page-title', 'Portfolio')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="font-mono text-xs" style="color:#444;">{{ $items->count() }} progetti totali</p>
    <a href="{{ route('admin.portfolio.create') }}" class="btn-admin btn-primary">+ Nuovo Progetto</a>
</div>

<div class="admin-card">
    @if($items->count())
    <table>
        <thead>
            <tr>
                <th>Titolo</th>
                <th>Artista</th>
                <th>Genere</th>
                <th>Anno</th>
                <th>Featured</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td class="text-white">{{ $item->title }}</td>
                <td>{{ $item->artist ?? '—' }}</td>
                <td>{{ $item->genre ?? '—' }}</td>
                <td class="font-mono text-xs">{{ $item->year ?? '—' }}</td>
                <td>
                    <span class="badge {{ $item->featured ? 'badge-red' : 'badge-gray' }}">
                        {{ $item->featured ? '★ Featured' : 'Normale' }}
                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.portfolio.edit', $item) }}" class="font-mono text-xs text-red-600 hover:text-red-500">Modifica</a>
                        <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST"
                              onsubmit="return confirm('Eliminare questo progetto?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-mono text-xs" style="color:#444; background:none; border:none; cursor:pointer;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun progetto. <a href="{{ route('admin.portfolio.create') }}" class="text-red-600">Aggiungi →</a></p>
    @endif
</div>
@endsection
