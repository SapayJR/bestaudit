<?php

namespace App\Repositories\Interfaces;

interface UserRepoInterface
{
    public function userById(int $id);

    public function userByUUID(string $uuid);

    public function usersList(array $array = []);
}
