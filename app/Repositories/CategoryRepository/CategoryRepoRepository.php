<?php

namespace App\Repositories\CategoryRepository;

use App\Models\Category as Model;
use App\Repositories\CoreRepository;
use App\Repositories\Interfaces\CategoryRepoInterface;

class CategoryRepoRepository extends CoreRepository implements CategoryRepoInterface
{
    /**
     */
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get Parent, only categories where parent_id == 0
     */
    public function parentCategories()
    {
        return $this->model()->where('parent_id', 0)
            ->with('parent.translations', 'translations')->orderByDesc('id')->get();
    }

    /**
     * Get categories with pagination
     */
    public function categoriesPaginate($perPage = 15, $array = [])
    {
        return $this->model()->with('children')->paginate($perPage);
    }

    /**
     * Get all categories list
     */
    public function categoriesList($array = [])
    {
        return $this->model()->with('parent.translation', 'translation')
            ->orderByDesc('id')->get();
    }

    /**
     * Get one category by Identification number
     */
    public function categoryDetails($id)
    {
        return $this->model()->with('parent')->find($id);
    }

    /**
     * Get one category by slug
     */
    public function categoryByAlias($alias)
    {
        return $this->model()->where('alias', $alias)->with('children')->first();
    }

}
