<x-layout title="Editar Série '{!! $serie->name !!}'">
        <form action="{{ route('series.update', $serie->id) }}" 
                method="post" :update="true" :nome="$serie->name">
            @csrf 
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" name="nome" 
                        id="nome" class="form-control"
                        value="{{ $serie->name }}">
            </div>
            <button type="submit" class="btn btn-dark">Editar</button>
        </form>
</x-layout>
