@extends('layouts.app')
@section('title', 'Portfolio | LaFamiglia808')

@section('content')
<div class="max-w-7xl mx-auto px-6 py-24">

    <!-- Header -->
    <div class="mb-20">
        <p class="font-mono text-xs tracking-widest uppercase text-red-600 mb-4 red-dot">I nostri lavori</p>
        <h1 class="font-display text-6xl md:text-8xl text-white mb-6">PORTFOLIO</h1>
        <div class="red-line"></div>
        <p class="mt-6 text-lg max-w-xl" style="color:#888;">
            Beats, progetti, collaborazioni. Ogni traccia racconta una storia.
        </p>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($items as $item)
        <div class="card-hover overflow-hidden" style="background:#111;">
            <!-- Cover -->
            <div style="aspect-ratio:1; position:relative; overflow:hidden;">
                @if($item->cover)
                <img src="{{ asset('storage/'.$item->cover) }}" alt="{{ $item->title }}"
                     class="w-full h-full object-cover">
                @else
                <div class="w-full h-full flex items-center justify-center"
                     style="background: linear-gradient(135deg, #1A1A1A 0%, #2A0A0A 100%);">
                    <span class="font-display text-8xl" style="color:#DC2626; opacity:0.2;">808</span>
                </div>
                @endif

                @if($item->featured)
                <span class="absolute top-4 left-4 font-mono text-xs tracking-widest uppercase px-3 py-1" style="background:#DC2626; color:#fff;">
                    Featured
                </span>
                @endif
            </div>

            <!-- Info -->
            <div class="p-6">
                @if($item->genre)
                <p class="font-mono text-xs tracking-widest text-red-600 mb-2 uppercase">{{ $item->genre }}</p>
                @endif
                <h3 class="font-display text-2xl text-white mb-1">{{ $item->title }}</h3>
                @if($item->artist)
                <p class="text-sm mb-3" style="color:#888;">{{ $item->artist }}</p>
                @endif
                @if($item->description)
                <p class="text-sm leading-relaxed mb-4" style="color:#666;">{{ Str::limit($item->description, 100) }}</p>
                @endif

                <!-- Links -->
                <div class="flex gap-3 flex-wrap">
                    @if($item->spotify_url)
                    <a href="{{ $item->spotify_url }}" target="_blank"
                       class="font-mono text-xs px-3 py-1.5 border border-gray-700 hover:border-green-500 hover:text-green-500 transition-colors">
                        Spotify
                    </a>
                    @endif
                    @if($item->youtube_url)
                    <a href="{{ $item->youtube_url }}" target="_blank"
                       class="font-mono text-xs px-3 py-1.5 border border-gray-700 hover:border-red-600 hover:text-red-600 transition-colors">
                        YouTube
                    </a>
                    @endif
                    @if($item->soundcloud_url)
                    <a href="{{ $item->soundcloud_url }}" target="_blank"
                       class="font-mono text-xs px-3 py-1.5 border border-gray-700 hover:border-orange-500 hover:text-orange-500 transition-colors">
                        SoundCloud
                    </a>
                    @endif
                </div>

                @if($item->year)
                <p class="font-mono text-xs mt-4" style="color:#444;">{{ $item->year }}</p>
                @endif
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-24" style="color:#444;">
            <p class="font-mono text-sm">Portfolio in costruzione. Torna presto.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
