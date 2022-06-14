<?php

namespace App\Services;


abstract class CoreService
{
    private mixed $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function model() {
        return clone $this->model;
    }


    /**
     * Set Default status of Model
     * @param int|null $id
     * @param int|null $default
     * @return array
     */
    public function setDefault(int $id = null, int $default = null){

        // Check Languages list, if first records set it default.
        if (count($this->model()->all()) <= 1) {
            $this->model->first()->update(['default' => 1, 'active' => 1]);
        }
        // Check and update default language if another language came with DEFAULT
        if ($default) {
            $defaultItem = $this->model()->whereDefault(1)->first();
            $defaultItem->update(['default' => 0]);

            // Check and update default language if another language came with DEFAULT
            if ($id) {
                $item = $this->model()->find($id);
                $item->update(['default' => 1, 'active' => 1]);
            }
        }

        return ['status' => true, 'message' => 'ok'];
    }
}
