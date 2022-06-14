<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Backend\BaseController;
use App\Models\Invitation;
use App\Models\Language;

class InvitationController extends BaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $invitations = Invitation::with([
            'shop.translation' => fn($q) => $q->where('locale', Language::getLanguagesList()->where('default', 1)->pluck('locale'))
        ])->where('user_id', auth()->id())->get();

        return view('backend.users.invitations.index', compact('invitations'));
    }
}
