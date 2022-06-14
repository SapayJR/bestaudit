<?php

namespace App\Services\Interfaces;

interface BrandServiceInterface
{
    public function create($collection);

    public function update(int $id, $collection);

    public function delete(int $id);
}
