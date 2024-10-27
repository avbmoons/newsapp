<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    function getAll(): Collection
    {
        return News::query()->get();
    }

    public function getNewsWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories', 'newsSource')->paginate($quantity);
    }

}
