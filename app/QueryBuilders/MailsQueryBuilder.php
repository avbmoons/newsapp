<?php

declare (strict_types=1);

namespace App\QueryBuilders;

use App\Models\Mail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MailsQueryBuilder extends QueryBuilder
{
    public Builder $model;

    public function __construct()
    {
        $this->model = Mail::query();
    }

    function getAll(): Collection
    {
        return Mail::query()->get();
    }

    public function getMailsWithPaginathion(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

}
