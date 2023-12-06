<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Series;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Series::all();
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
        $serie = new Series();
        $serie->name = $request->input('nome');
        $serie->save();

        for ($i=1; $i <= $request->seasonsQty; $i++) { 
            $seasons[] = [
                'series_id' => $serie->id,
                'number' => $i,
            ];
        }
        Season::insert($seasons);

        foreach ($serie->seasons as $season) {
            for ($j=1; $j <= $request->episodesPerSeason; $j++) { 
                $episodes[] = [
                    'season_id' => $season->id,
                    'number' => $j
                ];
            }   
        }
        Episode::insert($episodes);

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$serie->name} foi adicionada com sucesso");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$series->name} removida com sucesso");
    }

    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->name = $request->nome;
        $series->save();

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso.");
    }
}
