@extends('layouts.admin')
@section('title', 'Servizi')
@section('page-title', 'Servizi')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="font-mono text-xs" style="color:#444;">{{ $services->count() }} servizi totali</p>
    <a href="{{ route('admin.services.create') }}" class="btn-admin btn-primary">+ Nuovo Servizio</a>
</div>

<div class="admin-card">
    @if($services->count())
    <table>
        <thead>
            <tr>
                <th>Ordine</th>
                <th>Titolo</th>
                <th>Prezzo</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td class="font-mono text-xs" style="color:#444;">{{ $service->order }}</td>
                <td class="text-white">{{ $service->title }}</td>
                <td class="font-mono text-xs">{{ $service->price ?? '—' }}</td>
                <td>
                    <span class="badge {{ $service->active ? 'badge-green' : 'badge-gray' }}">
                        {{ $service->active ? 'Attivo' : 'Nascosto' }}
                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.services.edit', $service) }}" class="font-mono text-xs text-red-600 hover:text-red-500">Modifica</a>
                        <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                              onsubmit="return confirm('Eliminare questo servizio?')">
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
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun servizio. <a href="{{ route('admin.services.create') }}" class="text-red-600">Creane uno →</a></p>
    @endif
</div>
@endsection
