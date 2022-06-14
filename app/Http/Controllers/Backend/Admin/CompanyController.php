<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\CompanyRepoInterface;
use App\Repositories\TaxRepository\TaxRepository;
use App\Repositories\UserRepository\UserRepoRepository;
use App\Services\Interfaces\CompanyServiceInterface;
use Illuminate\Http\Request;

class CompanyController extends AdminBaseController
{
    private $companyRepo, $userRepoRepository, $companyService, $taxRepository;

    public function __construct(CompanyRepoInterface $companyRepo,
                                  CompanyServiceInterface $companyService,
                                    UserRepoRepository $userRepoRepository,
                                      TaxRepository $taxRepository)
    {
        parent::__construct();
        $this->companyService = $companyService;
        $this->companyRepo = $companyRepo;
        $this->userRepoRepository = $userRepoRepository;
        $this->taxRepository = $taxRepository;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(CompanyRepoInterface $companyRepo)
    {
        $companies = $companyRepo->getCompaniesList();

        return view('backend.admins.companies.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $users = $this->userRepoRepository->usersList();
        $taxes = $this->taxRepository->getTaxesList();
        return view('backend.admins.companies.create', compact('users', 'taxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->companyService->create($request);
        if ($result['status']) {

            return redirect()->route('admins.companies.index')->withToastSuccess(__('web.record_was_successfully_created'));
        }
        return redirect()->route('admins.companies.index')->withToastError($result['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
