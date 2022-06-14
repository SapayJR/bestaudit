<?php

namespace App\Services\Interfaces;

interface CurrencyServiceInterface
{
    public function create($collection);

    public function update($id, $collection);

    public function delete($id);
}
