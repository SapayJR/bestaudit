<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Requests\UserCreateRequest;
use App\Models\User;
use App\Repositories\Interfaces\UserRepoInterface;
use App\Services\Interfaces\UserServiceInterface;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends AdminBaseController
{
    use PasswordValidationRules;

    private $userRepository;
    private $userService;

    public function __construct(UserRepoInterface $userRepository, UserServiceInterface $userService)
    {
        parent::__construct();
        $this->userRepository = $userRepository;
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.admins.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        $roles = Role::all();
        return view('backend.admins.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $result = $this->userService->create($request);
        if ($result['success']) {
            return redirect()->route('admins.users.index')->withSuccess(__('web.record_was_successfully_created'));
        }
        return redirect()->back()->withError($result['message'])->withInputs();
    }

    /**
     * Display the specified resource.
     *
     * @param string $uuid
     * @return \Illuminate\Contracts\View\View
     */
    public function profilePersonal(string $uuid)
    {
        $user = User::firstWhere('uuid', $uuid);
        return view('backend.admins.users.profile.personal', compact('user'));
    }

    public function profilePermission(string $uuid)
    {
        $user = User::firstWhere('uuid', $uuid);
        return view('backend.admins.users.profile.permission', compact('user'));
    }

    public function profileCompany(string $uuid)
    {
        $user = User::firstWhere('uuid', $uuid);
        return view('backend.admins.users.profile.company', compact('user'));
    }

    public function profileSecurity(string $uuid)
    {
        $user = User::firstWhere('uuid', $uuid);
        \MetaTag::setTags(['title' => config('app.name') . ' | ' . __('web.profile') . ' ' . $user->firstname]);
        return view('backend.admins.users.profile.security', compact('user'));
    }

    public function passwordUpdate($uuid, Request $request)
    {
        $array = $request->all();
        $user = User::firstWhere('uuid', $uuid);

        $validate = Validator::make($array, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $array) {
            if (! isset($array['current_password']) || ! Hash::check($array['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        });
        if ($validate->errors()->any()) {
            return redirect()->back()->withInput();
        }
        $user->forceFill([
            'password' => Hash::make($array['password']),
        ])->save();

        return redirect()->route('admins.users.profile.security', $uuid)->withSuccess(__('web.record_was_successfully_created'));

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

    public function profile($id){
        $user = User::find($id);
        return view('backend.users.profile.show');
    }
}
