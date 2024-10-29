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

    public function getAll(): Collection
    {
        return Category::query()->get();
    }

    public function getCategoryByStatus(string $status): Collection
    {
        return Category::query()->where('status', $status)->get();
    }

    public function getCategoryById(int $id): Collection
    {
        return Category::query()->where('id', $id)->get();
    }

    public function getCategoryBySlug(string $slug): Collection
    {
        return Category::query()->where('slug', $slug)->get();
    }

    public function getCategoryIdBySlug($slug): mixed
    {
        return Category::query()->where('slug', $slug)->get('id');
    }

    public function getCategoriesWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }
}
