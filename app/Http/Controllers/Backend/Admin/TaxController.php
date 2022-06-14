<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Repositories\Interfaces\CompanyRepoInterface;
use App\Repositories\Interfaces\TaxRepoInterface;
use App\Repositories\TaxRepository\TaxRepository;
use App\Services\Interfaces\TaxServiceInterface;
use Illuminate\Http\Request;

class TaxController extends AdminBaseController
{
    private $taxRepository, $taxService;



    public function __construct(TaxRepoInterface $taxRepository, TaxServiceInterface $taxService)
    {
        parent::__construct();
        $this->taxRepository = $taxRepository;
        $this->taxService = $taxService;
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(TaxRepository $taxRepository)
    {
        $taxes = $taxRepository->getTaxesList();
        return view('backend.admins.taxes.index', compact('taxes'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('backend.admins.taxes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->taxService->create($request);
        if ($result['status']) {

            return redirect()->route('admins.taxes.index')->withToastSuccess(__('web.record_was_successfully_created'));
        }
        return redirect()->route('admins.taxes.index')->withToastError($result['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
