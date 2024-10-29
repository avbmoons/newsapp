<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Psy\CodeCleaner\ReturnTypePass;

class NewsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = News::query();
    }

    public function getAll(): Collection
    {
        return News::query()->get();
    }

    public function getNewsByStatus(string $status): Collection
    {
        return News::query()->where('status', $status)->get();
    }

    public function getNewsById(int $id): Collection
    {
        return News::query()->where('id', $id)->get();
    }

    public function getNewsWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->with('categories', 'newsSource')->paginate($quantity);
    }

}
