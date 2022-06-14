<?php

namespace App\Services\CompanyServices;

use App\Models\Company;
use App\Services\CoreService;
use App\Services\Interfaces\CompanyServiceInterface;

class CompanyService extends CoreService implements CompanyServiceInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Company::class;
    }

    public function create($collection)
    {
        $company = $this->model()->create($this->setCompanyParams($collection));
        if ($company) {
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
    }

    public function update(string $alias, $collection)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    private function setCompanyParams($collection)
    {
        return [
            'title' => $collection->title ?? null,
            'auditor_id' => $collection->auditor_id,
            'taxes_id' => $collection->taxes_id,
            'user_id' => $collection->user,
            'legal_name' =>$collection->legal_name,
            'Address' => $collection->Address,
            'oked' => $collection->oked,
            'ceo' => $collection->ceo,
            'bank_account' => $collection->bank_account,
            'bank_name' => $collection->bank_name,
            'tin' => $collection->tin,
            'mfo' => $collection->mfo,

        ];
    }
}