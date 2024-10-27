<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriesQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Category::query();
    }

    function getAll(): Collection
    {
        return Category::query()->get();
    }

    public function getCategoriesWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
