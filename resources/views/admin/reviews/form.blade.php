@extends('layouts.admin')
@section('title', isset($review->id) ? 'Modifica Recensione' : 'Nuova Recensione')
@section('page-title', isset($review->id) ? 'Modifica Recensione' : 'Nuova Recensione')

@section('content')
<div class="max-w-xl">
    <form action="{{ isset($review->id) ? route('admin.reviews.update', $review) : route('admin.reviews.store') }}"
          method="POST" class="space-y-5">
        @csrf
        @if(isset($review->id)) @method('PUT') @endif

        <div class="admin-card space-y-5">
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Nome *</label>
                    <input type="text" name="name" value="{{ old('name', $review->name ?? '') }}" required class="form-input">
                </div>
                <div>
                    <label class="form-label">Ruolo (es. Rapper, Producer)</label>
                    <input type="text" name="role" value="{{ old('role', $review->role ?? '') }}" class="form-input" placeholder="Artista">
                </div>
            </div>

            <div>
                <label class="form-label">Testo recensione *</label>
                <textarea name="body" rows="5" required class="form-input resize-none">{{ old('body', $review->body ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Rating (1-5 stelle)</label>
                    <select name="rating" class="form-input">
                        @foreach([5,4,3,2,1] as $r)
                        <option value="{{ $r }}" {{ old('rating', $review->rating ?? 5) == $r ? 'selected' : '' }}>
                            {{ str_repeat('★',$r) }} ({{ $r }}/5)
                        </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="form-label">Ordine di visualizzazione</label>
                    <input type="number" name="order" value="{{ old('order', $review->order ?? 0) }}" class="form-input" min="0">
                </div>
            </div>

            <div class="flex items-center gap-3">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1" id="active"
                       {{ old('active', $review->active ?? true) ? 'checked' : '' }}
                       class="w-4 h-4 cursor-pointer" style="accent-color:#DC2626;">
                <label for="active" class="font-mono text-xs tracking-widest uppercase cursor-pointer" style="color:#888;">Visibile sul sito</label>
            </div>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="btn-admin btn-primary">
                {{ isset($review->id) ? 'Aggiorna' : 'Aggiungi' }}
            </button>
            <a href="{{ route('admin.reviews.index') }}" class="btn-admin btn-secondary">Annulla</a>
        </div>
    </form>
</div>
@endsection
