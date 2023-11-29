<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        return view('series.create'); 
    }

    public function store(Request $request)
    {
        $nome = $request->input('nome');
        $serie = new Serie();
        $serie->name = $nome;
        $serie->save();

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$serie->name} foi adicionada com sucesso");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$series->name} removida com sucesso");
    }
}
