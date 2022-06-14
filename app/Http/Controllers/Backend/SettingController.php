<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Artisan;
use Illuminate\Http\Request;

class SettingController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function translationManager(){

        return view('backend.admins.settings.translations');
    }

    public function cacheClear(){
        Artisan::call('cache:clear');
        return redirect()->back()->withToastSuccess(__('web.cache_successfully_cleared'));
    }
}
