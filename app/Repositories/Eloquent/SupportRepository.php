<?php

namespace App\Repositories\Eloquent;

use App\Models\Support as Model;
use App\Repositories\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use App\Repositories\SupportRepositoryInterface;
use Illuminate\Validation\Rules\In;

class SupportRepository implements SupportRepositoryInterface
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getByStatus(string $status, int $page): PaginationInterface
    {
        //$limit = 15;
        //$skip = ($page - 1) * $limit;

        $supports = $this->model
                        ->where('status', $status)
                        ->with(['user', 'lesson'])
                        //->skip($skip)
                        //->limit(15)
                        ->paginate();

        return new PaginationPresenter($supports);
    }

    public function findById(string $id): object|null
    {
        return $this->model
                    ->with([
                        'user',
                        'lesson',
                        'replies.user',
                        'replies.admin',
                    ])
                    ->find($id);
    }
}
