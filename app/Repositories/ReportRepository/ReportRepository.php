<?php

namespace App\Repositories\ReportRepository;

use App\Models\Report as Model;
use App\Repositories\CoreRepository;
use App\Repositories\Interfaces\ReportRepoInterface;

class ReportRepository extends CoreRepository implements ReportRepoInterface
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getReportsDate()
    {
        return $this->model->orderByDesc('id')->get();
    }
}
