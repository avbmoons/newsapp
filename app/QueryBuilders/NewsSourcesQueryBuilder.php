<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\NewsSource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsSourcesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = NewsSource::query();
    }

    function getAll(): Collection
    {
        return NewsSource::query()->get();
    }

    public function getNewsSourcesWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
