<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Repositories\Interfaces\CategoryRepoInterface;
use App\Services\Interfaces\CategoryServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CategoryController extends AdminBaseController
{
    private $categoryService, $categoryRepository;

    /**
     * @param CategoryServiceInterface $categoryService
     * @param CategoryRepoInterface $categoryRepository
     */
    public function __construct(CategoryServiceInterface $categoryService, CategoryRepoInterface $categoryRepository)
    {
        parent::__construct();
        $this->categoryService = $categoryService;
        $this->categoryRepository = $categoryRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $categories = $this->categoryRepository->categoriesList();

        return view('backend.admins.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $categories = $this->categoryRepository->parentCategories();
        $delimiter = ' ';

        return view('backend.admins.categories.create',
            compact( 'categories', 'delimiter')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->categoryService->create($request);
        if ($result['status']) {

            return redirect()->route('admins.categories.index')->withToastSuccess(__('web.record_was_successfully_created'));
        }
        return redirect()->route('admins.categories.index')->withToastError($result['message']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(string $alias)
    {
        $item = $this->categoryRepository->categoryByAlias($alias);
        if($item) {
            $categories = $this->categoryRepository->parentCategories();
            $delimiter = '';

            return view('backend.admins.categories.edit',
                compact('item', 'categories', 'delimiter')
            );
        }
        return redirect()->route('admins.categories.index')->withToastError(__('web.record_not_found'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $alias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $alias)
    {
        $result = $this->categoryService->update($alias, $request);

        if ($result['status']) {
            return redirect()->route('admins.categories.index')->withToastSuccess(__('web.record_was_successfully_updated'));
        }
        return redirect()->route('admins.categories.index')->withToastError($result['message']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->categoryService->delete($id);

        if ($result['status']) {
            return redirect()->route('admins.categories.index')->withToastSuccess( __('web.record_was_successfully_deleted'));
        }
        return redirect()->route('admins.categories.index')->withToastError($result['message']);
    }
}
