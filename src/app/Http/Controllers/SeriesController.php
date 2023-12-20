<?php

namespace App\Http\Controllers;

use App\Events\SeriesCreated as SeriesCreatedEvent;
use App\Http\Middleware\Autenticador;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Support\Facades\Storage;

class SeriesController extends Controller
{
    /**
     *
     * @param SeriesRepository $repository
     */
    public function __construct(private SeriesRepository $repository) 
    {
        $this->middleware(Autenticador::class)->except('index');
    }

    /**
     *
     * @return void
     */
    public function index()
    {
        $series = $this->repository->show();
        $mensagemSucesso = session('mensagem.sucesso');

        return view('series.index')->with('series', $series)
            ->with('mensagemSucesso', $mensagemSucesso);
    }

    /**
     *
     * @return void
     */
    public function create()
    {
        return view('series.create'); 
    }

    /**
     *
     * @param SeriesFormRequest $request
     * @return void
     */
    public function store(SeriesFormRequest $request)
    {
        $request->file('cover') ? $request->coverPath = $request->file('cover')
            ->store('series_cover', 'public') : null;

        $serie = $this->repository->add($request);
        SeriesCreatedEvent::dispatch(
            $serie->name,
            $serie->id,
            $request->seasonsQty,
            $request->episodesPerSeason,
        );
        
        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$serie->name} foi adicionada com sucesso");
    }

    /**
     *
     * @param Series $series
     * @return void
     */
    public function destroy(Series $series)
    {
        if (!is_null($series->cover_path)) {
            Storage::disk('public')->delete($series->cover_path);
        }
        $this->repository->remove($series);

        return to_route('series.index')
                ->with('mensagem.sucesso', "Série {$series->name} removida com sucesso");
    }

    /**
     *
     * @param Series $series
     * @return void
     */
    public function edit(Series $series)
    {
        return view('series.edit')->with('serie', $series);
    }

    /**
     *
     * @param Series $series
     * @param SeriesFormRequest $request
     * @return void
     */
    public function update(Series $series, SeriesFormRequest $request)
    {
        $this->repository->update($series, $request);

        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$series->name}' atualizada com sucesso.");
    }
}
