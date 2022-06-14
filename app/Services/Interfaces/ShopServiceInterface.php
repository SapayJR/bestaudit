<?php

namespace App\Services\Interfaces;

use App\Enums\ShopStatus;

interface ShopServiceInterface
{
    public function create($collection);

    public function update(int $id, $collection);

    public function delete(int $id);

}
