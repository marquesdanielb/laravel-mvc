<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    public function __construct(
        private SeriesRepository $repository,
    ) {}

    public function index()
    {
        $series = $this->repository->show();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create'); 
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = $this->repository->add($request);
        
        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$serie->name} foi adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $this->repository->remove($series);

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$series->name} removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $this->repository->update($series, $request);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso.");
    }
}
