<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;
use App\Repositories\SeriesRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {
            $serie = new Series();
            $serie->name = $request->input('nome');
            $serie->cover_path = $request->coverPath;
            $serie->save();

            $seasons = [];
            for ($i=1; $i <= $request->seasonsQty; $i++) { 
                $seasons[] = [
                    'series_id' => $serie->id,
                    'number' => $i,
                ];
            }
            Season::insert($seasons);

            $episodes = [];
            foreach ($serie->seasons as $season) {
                for ($j=1; $j <= $request->episodesPerSeason; $j++) { 
                    $episodes[] = [
                        'season_id' => $season->id,
                        'number' => $j,
                    ];
                }   
            }
            Episode::insert($episodes);

            return $serie;
            });
    }

    public function show(): Collection
    {
        return DB::transaction(function () {
            $series = Series::all();

            return $series;
        });
    }

    public function remove(Series $series): bool|null
    {
        return DB::transaction(function () use ($series) {
            $series->delete();
        });
    }

    public function update(Series $series, SeriesFormRequest $request): bool|null
    {
        return DB::transaction(function () use ($series, $request) {
            $series->name = $request->nome;
            $series->save();
        });
    }
}