<?php

namespace App\Services\CategoryServices;

use App\HelpersClass\FileHelperClass;
use App\Models\Category;
use App\Models\Language;
use App\Services\CoreService;
use App\Services\Interfaces\CategoryServiceInterface;

class CategoryService extends CoreService implements CategoryServiceInterface
{

    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Category::class;
    }

    /**
     * @param $collection
     * @return mixed
     */
    public function create($collection)
    {
        $category = $this->model()->create($this->setCategoryParams($collection));
        if ($category) {
            $this->setTranslations($category, $collection);

            if ($collection->img) {
                $img = FileHelperClass::uploadFile($collection->img, 'images/categories', 1920,1536);
                $category->update(['img' => $img]);
            }
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.error_during_creating')];

    }

    /**
     * @param string $alias
     * @param $collection
     * @return array
     */
    public function update(string $alias, $collection): array
    {
        $category = $this->model()->firstWhere('alias',  $alias);
        if ($category) {
            $category->update($this->setCategoryParams($collection));
            $this->setTranslations($category, $collection);

            if ($collection->img) {
                $img = FileHelperClass::uploadFile($collection->img, 'images/categories');
                $category->update(['img' => $img]);
            }
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function delete(int $id)
    {
        $item = $this->model()->find($id);
        if ($item) {
            if (count($item->children) > 0) {
                return ['status' => false, 'message' =>  __('web.cant_delete_record_that_has_children')];
            }
            FileHelperClass::deleteFile('images/categories/'.$item->img);
            $item->delete();
            return ['status' => true, 'message' => 'ok'];
        }
        return ['status' => false, 'message' => __('web.record_not_found')];
    }

    private function setCategoryParams($collection){
        return [
            'keywords' => $collection->keywords ?? null,
            'parent_id' => $collection->parent_id,
            'type' => $collection->type,
            'active' => $collection->active ?? 0,
        ];
    }

    public function setTranslations($model, $collection){
        $model->translations()->delete();

        foreach ($collection->title as $index => $value){
            $model->translation()->create([
                'title' => $value,
                'description' => $collection->description[$index],
                'locale' => $index,
            ]);
        }
    }
}
