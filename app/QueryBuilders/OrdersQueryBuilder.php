<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class OrdersQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Order::query();
    }

    function getAll(): Collection
    {
        return Order::query()->get();
    }

    public function getOrdersWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}
