@extends('layouts.admin')
@section('title', $service->id ? 'Modifica Servizio' : 'Nuovo Servizio')
@section('page-title', $service->id ? 'Modifica Servizio' : 'Nuovo Servizio')

@section('content')
<div class="max-w-2xl">
    <form action="{{ $service->id ? route('admin.services.update', $service) : route('admin.services.store') }}"
          method="POST" class="space-y-6">
        @csrf
        @if($service->id) @method('PUT') @endif

        <div class="admin-card space-y-5">
            <div>
                <label class="form-label">Titolo *</label>
                <input type="text" name="title" value="{{ old('title', $service->title) }}" required class="form-input">
                @error('title')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Descrizione *</label>
                <textarea name="description" rows="5" required class="form-input resize-none">{{ old('description', $service->description) }}</textarea>
                @error('description')<p class="mt-1 text-xs text-red-500">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Prezzo</label>
                    <input type="text" name="price" value="{{ old('price', $service->price) }}" class="form-input" placeholder="Da €150">
                </div>
                <div>
                    <label class="form-label">Ordine</label>
                    <input type="number" name="order" value="{{ old('order', $service->order ?? 0) }}" class="form-input" min="0">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" id="active"
                       {{ old('active', $service->active ?? true) ? 'checked' : '' }}
                       class="w-4 h-4 cursor-pointer" style="accent-color:#DC2626;">
                <label for="active" class="font-mono text-xs tracking-widest uppercase cursor-pointer" style="color:#888;">Servizio attivo (visibile sul sito)</label>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-admin btn-primary">
                {{ $service->id ? 'Aggiorna' : 'Crea Servizio' }}
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn-admin btn-secondary">Annulla</a>
        </div>
    </form>
</div>
@endsection
