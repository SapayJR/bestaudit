<?php

namespace App\Services\Interfaces;

interface TaxServiceInterface
{
    public function create($collection);

    public function update(string $alias, $collection);

    public function delete(int $id);
}
