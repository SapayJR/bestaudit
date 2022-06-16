<?php

namespace App\Services\TaxServices;

use App\Models\Tax;
use App\Services\CoreService;
use App\Services\Interfaces\TaxServiceInterface;

class TaxService extends CoreService implements TaxServiceInterface
{


    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Tax::class;
    }

    public function create($collection)
    {
        $tax = $this->model()->create($this->setTaxParams($collection));
        if ($tax) {
            $this->setTranslations($tax, $collection);
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
    }


    public function update(int $id, $collection)
    {
        $tax = $this->model()->find($id);
        if ($tax) {
            $tax->update($this->setTaxParams($collection));
            $this->setTranslations($tax,$collection);
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
        }


    public function delete(int $id)
    {
        $tax = $this->model()->find($id);
        if ($tax){
            $tax->delete();
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
    }

    private function setTaxParams($collection)
    {
        return [
            'tax_rate' => $collection->tax_rate
        ];
    }

    public function setTranslations($model, $collection){
        $model->translations()->delete();

        foreach ($collection->title as $index => $value){
            $model->translation()->create([
                'title' => $value,
                'locale' => $index,
            ]);
        }
    }
}
