<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Series;

interface SeriesRepository
{
    public function add(SeriesFormRequest $request): Series;

    public function show(): Collection;
    
    public function remove(Series $series): bool|null;

    public function update(Series $series, SeriesFormRequest $request): bool|null;
}
