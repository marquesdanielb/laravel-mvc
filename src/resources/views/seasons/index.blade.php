<x-layout title="Temporadas de {!! $series->name !!}">
    <div class="d-flex justify-center">
    <img src="{{ asset('storage/' . $series->cover_path) }}" 
        alt="Capa da série" class="img-fluid"
        style="height: 300px">
    </div>
    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth<a href="{{ route('episodes.index', $season->id) }}">
                    Temporada: {{ $season->number }}
                @endauth</a>
                <span class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </span>
            </li>
        @endforeach
    </ul>
</x-layout>