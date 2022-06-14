<?php

namespace App\Repositories\Interfaces;

interface CategoryRepoInterface
{

    public function parentCategories();

    public function categoriesList($array = []);

    public function categoriesPaginate($perPage = 15, $array = []);

    public function categoryDetails($id);

    public function categoryByAlias($alias);
}
