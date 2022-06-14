<?php

namespace App\Observers;

use App\Models\Category;
use App\Models\Language;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     *
     * @param Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        $this->setAlias($category);
    }

    /**
     * Handle the Category "created" event.
     *
     * @param Category $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the Category "deleted" event.
     *
     * @param Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the Category "restored" event.
     *
     * @param Category $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Category "force deleted" event.
     *
     * @param Category $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }

    private function setAlias(Category $category){
        if(!$category->alias){
            $category->alias = str()->uuid();
        }
    }
}
