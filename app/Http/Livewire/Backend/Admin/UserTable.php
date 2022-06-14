<?php

namespace App\Http\Livewire\Backend\Admin;

use App\Models\User;
use Exception;
use Livewire\Component;

class UserTable extends Component
{
    public $search;
    public $length = 20;
    public $count;
    public $tag = 'id';
    public $sort = 'desc';


    public function mount(){
        $this->count = User::count();
    }
    /**
     * @throws Exception
     */
    public function render()
    {
        $this->length = $this->length > 0 ? $this->length : $this->length = 20;
        $users = $this->search
            ? $this->usersFilter()
            : User::with('roles')
                ->orderBy($this->tag, $this->sort)
                ->take($this->length)->get();

        return view('livewire.backend.admin.user-table', compact('users'));
    }

    /**
     * @throws Exception
     */

    public function usersFilter(){
        $search = $this->search;

        return User::with('roles')
            ->where('firstname', 'LIKE', "%$search%")
            ->orWhere('lastname', 'LIKE', "%$search%")
            ->orWhere('email', 'LIKE', "%$search%")
            ->take($this->length)
            ->orderBy($this->tag, $this->sort)
            ->get();
    }

    public function sortBy($tag){
        $this->sort = $this->sort == 'asc'? 'desc' : 'asc';
        $this->tag = $tag ?? 'id';
    }

}
