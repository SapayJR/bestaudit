<?php

namespace App\Repositories\CompanyRepository;

use App\Models\Company as Model;
use App\Repositories\CoreRepository;
use App\Repositories\Interfaces\CompanyRepoInterface;

class CompanyRepository extends CoreRepository implements CompanyRepoInterface
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCompaniesList()
    {
        return $this->model->orderByDesc('id')->get();
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
