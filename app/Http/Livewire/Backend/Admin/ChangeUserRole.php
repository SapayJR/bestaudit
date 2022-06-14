<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Traits\SweetAlertResponse;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ChangeUserRole extends Component
{
    use SweetAlertResponse;

    public $user, $userRole;

    public function mount($user){
        $this->user = $user;
        $this->userRole = $user->role;
    }

    public function render()
    {
        $roles = Role::all();
        return view('livewire.backend.admin.change-user-role', compact('roles'));
    }

    public function changeRole(){
        sleep(1);

        $this->user->syncRoles($this->userRole);
        $this->sweetAlert2Success();
    }

}
