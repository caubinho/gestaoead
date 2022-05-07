<?php

namespace App\Repositories\Eloquent;
use App\Models\User as Model;

class UserRepositories
{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
