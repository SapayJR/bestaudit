<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function dashboard(){
        if (auth()->user()->hasRole('client')){

            \MetaTag::setTags(['title' => config('app.name')]);
            return view('backend.users.dashboard');
        }

        $users = User::take(6)
            ->join('sessions',  'users.id', '=', 'sessions.user_id' )
            ->orderBy('sessions.last_activity', 'desc')
            ->get();

        $usersCount = User::count();

        \MetaTag::setTags(['title' => config('app.name')]);
        return view('backend.admins.dashboard', compact('users', 'usersCount'));
    }
}
