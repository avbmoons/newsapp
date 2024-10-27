<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\About;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AboutsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = About::query();
    }

    function getAll(): Collection
    {
        return About::query()->get();
    }

    public function getAboutsWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}
