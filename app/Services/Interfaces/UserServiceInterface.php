<?php

namespace App\Services\Interfaces;


interface UserServiceInterface
{
    public function create($collection);

    public function update($id, $collection);

    public function updatePassword($uuid, $array);
}
