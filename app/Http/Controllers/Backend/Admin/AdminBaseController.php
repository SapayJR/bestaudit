<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Backend\BaseController;

abstract class AdminBaseController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }
}
