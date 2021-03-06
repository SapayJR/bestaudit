<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Repositories\Interfaces\CompanyRepoInterface;
use App\Repositories\TaxRepository\TaxRepository;
use App\Repositories\UserRepository\UserRepoRepository;
use App\Services\Interfaces\CompanyServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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
     * @return View
     */
    public function index(CompanyRepoInterface $companyRepo)
    {
        $companies = $companyRepo->getCompaniesList();

        return view('backend.admins.companies.index', compact('companies'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id)
    {
        $users = $this->userRepoRepository->usersList();
        $taxes = $this->taxRepository->getTaxesList();
        $company = Company::with('taxes')->findOrFail($id);
        return view('backend.admins.companies.edit', compact('company', 'users', 'taxes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,int $id)
    {
        $result = $this->companyService->update($id, $request);
        if ($result['status']) {

            return redirect()->route('admins.companies.index')->withToastSuccess(__('web.record_was_successfully_created'));
        }
        return redirect()->route('admins.companies.index')->withToastError($result['message']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->companyService->delete($id);

        if ($result['status']) {
            return redirect()->route('admins.companies.index')->withToastSuccess( __('web.record_was_successfully_deleted'));
        }
        return redirect()->route('admins.companies.index')->withToastError($result['message']);
    }
}
