@extends('layouts.admin')
@section('title', 'Messaggi')
@section('page-title', 'Messaggi')

@section('content')
<div class="admin-card">
    @if($messages->count())
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Oggetto</th>
                <th>Data</th>
                <th>Stato</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach($messages as $msg)
            <tr>
                <td class="{{ !$msg->read ? 'text-white font-semibold' : '' }}">{{ $msg->name }}</td>
                <td>{{ $msg->email }}</td>
                <td>{{ Str::limit($msg->subject, 50) }}</td>
                <td class="font-mono text-xs">{{ $msg->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <span class="badge {{ $msg->read ? 'badge-gray' : 'badge-red' }}">
                        {{ $msg->read ? 'Letto' : 'Nuovo' }}
                    </span>
                </td>
                <td>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.messages.show', $msg) }}" class="font-mono text-xs text-red-600 hover:text-red-500">Apri</a>
                        <form action="{{ route('admin.messages.read', $msg) }}" method="POST">
                            @csrf @method('PATCH')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">
                                {{ $msg->read ? 'Non letto' : 'Segna letto' }}
                            </button>
                        </form>
                        <form action="{{ route('admin.messages.destroy', $msg) }}" method="POST"
                              onsubmit="return confirm('Eliminare questo messaggio?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="font-mono text-xs" style="background:none;border:none;cursor:pointer;color:#444;">Elimina</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $messages->links() }}
    </div>
    @else
    <p class="font-mono text-xs text-center py-8" style="color:#333;">Nessun messaggio ricevuto.</p>
    @endif
</div>
@endsection
