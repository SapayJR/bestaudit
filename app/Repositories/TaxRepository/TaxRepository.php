<?php

namespace App\Repositories\TaxRepository;

use App\Models\Tax as Model;
use App\Repositories\CoreRepository;
use App\Repositories\Interfaces\TaxRepoInterface;

class TaxRepository extends CoreRepository implements TaxRepoInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getTaxesList()
    {
        return $this->model->orderByDesc('id')->get();
    }
}
