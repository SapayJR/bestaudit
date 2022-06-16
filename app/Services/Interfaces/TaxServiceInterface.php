<?php

namespace App\Services\Interfaces;

interface TaxServiceInterface
{
    public function create($collection);

    public function update(int $id, $collection);

    public function delete(int $id);
}
