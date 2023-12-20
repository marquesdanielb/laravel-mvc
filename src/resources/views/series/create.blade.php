<x-layout title="Nova Série">
        <form action="{{ route('series.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-8">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome"
                            autofocus 
                            id="nome" class="form-control"
                            value="{{ old('nome') }}">
                </div>
                <div class="col-2">
                    <label for="seasonsQty" class="form-label">Temporadas:</label>
                    <input type="text" name="seasonsQty" 
                            id="seasonsQty" class="form-control"
                            value="{{ old('seasonsQty') }}">
                </div>
                <div class="col-2">
                    <label for="episodesPerSeason" class="form-label">Eps/Temporada:</label>
                    <input type="text" name="episodesPerSeason" 
                            id="episodePerQty" class="form-control"
                            value="{{ old('episodesPerSeason') }}">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12">
                    <label for="cover" class="form-label">Capa</label>
                    <input type="file" id="cover" 
                        name="cover" class="form-control"
                        accept="image/gif, image/jpeg, image/png">
                </div>
            </div>
            <button type="submit" class="btn btn-dark">Adicionar</button>
        </form>

</x-layout>
