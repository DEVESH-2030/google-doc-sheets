<?php

namespace App\Repositories;

use App\Models\User;

class GoogleSheetRepository extends BaseRepository
{
    public function __construct(User $model) {
        $this->model = $model;
    }

    public function findByEmail($email)
    {
        return $this->model->whereEmail($email);
    }
}
