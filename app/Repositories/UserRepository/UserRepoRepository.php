<?php

namespace App\Repositories\UserRepository;

use App\Models\User as Model;
use App\Repositories\CoreRepository;
use App\Repositories\Interfaces\UserRepoInterface;

class UserRepoRepository extends CoreRepository implements UserRepoInterface
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function userById(int $id)
    {
        return $this->model()->with('roles')->find($id);
    }

    public function userByUUID(string $uuid)
    {
        return $this->model()->with('roles')->firstWhere('uuid', $uuid);
    }

    public function usersList(array $array = [])
    {
        return $this->model()->all();
    }

}
