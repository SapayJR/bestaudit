<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Backend\BaseController;
use App\Models\Language;
use App\Models\Shop;
use App\Services\Interfaces\ShopServiceInterface;
use Illuminate\Http\Request;

class ShopController extends BaseController
{
    private ShopServiceInterface $shopService;

    public function __construct(ShopServiceInterface $shopService)
    {
        parent::__construct();
        $this->shopService = $shopService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        if (auth()->user()->shop){
            return redirect()->route('users.shops.show', auth()->user()->shop->uuid);
        }

        $languages = Language::getLanguagesList()->pluck('locale');

        return view('backend.users.shops.create', compact('languages'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $result = $this->shopService->create($request->except('active', 'status', 'show_type'));
        if ($result['status']) {
            return redirect()->back();
        }
        return redirect()->back()->withErrors($result['message']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function show($uuid)
    {
        $shop = Shop::firstWhere('uuid', $uuid);

        return view('backend.users.shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $uuid
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(string $uuid)
    {
        $shop = Shop::firstWhere('uuid', $uuid);
        $languages = Language::getLanguagesList()->pluck('locale');

        return view('backend.users.shops.edit', compact('shop', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $result = $this->shopService->update($id, $request->merge(['active' => 0, 'status' => 'edited'])->except('show_type'));

        if ($result['status']) {
            return redirect()->route('users.shops.create')->withSuccess($result['message']);
        }
        return redirect()->back()->withErrors($result['message']);
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

    /**
     * Remove the images from storage and model
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function imageDestroy(int $id)
    {
        $tag = \request()->tag;
        $shop = Shop::findOrFail($id);

        if (isset($tag) && $tag == 'logo') {
            \Storage::disk('public')->delete($shop->logo_img);
            $shop->update(['logo_img' => null]);
        } elseif (isset($tag) && $tag == 'background') {
            \Storage::disk('public')->delete( $shop->background_img);
            $shop->update(['background_img' => null]);
        }

        return redirect()->back()->withToastSuccess(__('web.record_was_successfully_deleted'));
    }
}
