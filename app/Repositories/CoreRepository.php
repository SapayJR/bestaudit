<?php

namespace App\Repositories;

use App\Models\Currency;
use App\Models\Language;
use phpDocumentor\Reflection\Utils;

abstract class CoreRepository
{
    protected mixed $model;
    protected mixed $currency;
    protected mixed $language;
    protected string $updatedDate;

    /**
     * CoreRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
        $this->language = request('lang') ?? null;
        $this->currency = request('currency_id')?? null;
        $this->updatedDate = request('updated_at') ?? '2021-01-01';
    }

    abstract protected function getModelClass();

    protected function model(){
        return clone $this->model;
    }

    /**
     * Set Updated Date
     */
    protected function setUpdatedDate(){
        return $this->updatedDate;
    }
}
