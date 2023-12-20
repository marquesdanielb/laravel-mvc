<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">
    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth
    
    <ul class="list-group">
        @foreach ($series as $serie)
            <div class="d-flex align-items-center">
                <img src="{{ asset('storage/' . $serie->cover_path) }}" width="75px" class="img-thumbnail">
            </div>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @auth<a href="{{ route('seasons.index', $serie->id) }}">@endauth
                    {{ $serie->name }}
                @auth</a>@endauth
                @auth
                    <span class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm">
                            E
                        </a>
                        <form action="{{ route('series.destroy', $serie->id) }}" 
                            class="ms-2" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                x
                            </button>
                        </form>
                    </span>
                @endauth
            </li>
        @endforeach
    </ul>
</x-layout>