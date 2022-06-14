<?php

namespace App\Services\Interfaces;

interface CompanyServiceInterface
{
    public function create($collection);

    public function update(string $alias, $collection);

    public function delete(int $id);

}
