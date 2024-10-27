<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\Home;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class HomesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Home::query();
    }

    function getAll(): Collection
    {
        return Home::query()->get();
    }

    public function getHomesWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}
