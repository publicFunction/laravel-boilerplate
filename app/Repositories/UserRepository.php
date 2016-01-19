<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends EloquentRepository
{
    /**
     * Set the relevant model instance.
     *
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}