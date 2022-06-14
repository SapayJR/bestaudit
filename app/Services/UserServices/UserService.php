<?php
namespace App\Services\UserServices;

use App\HelpersClass\ResponseError;
use App\Services\CoreService;
use App\Services\Interfaces\UserServiceInterface;
use App\Models\User as Model;
use Hash;

class UserService extends CoreService implements UserServiceInterface
{

    /**
     * @return mixed
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function __construct()
    {
        parent::__construct();
    }

    public function create($collection)
    {
        try {
            $user = $this->model()->create($this->setUserParams($collection));
            \Log::info([$collection->password]);
            if($user) {
                $user->syncRoles($collection->role);
                return ['success' => true, 'message' => ResponseError::NO_ERROR, 'data' => $user];
            }
            return ['success' => false, 'message' => ResponseError::ERROR_501];
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function update($id, $collection)
    {
        // TODO: Implement update() method.
    }

    public function updatePassword($uuid, $array){




        return true;
    }

    public function setUserParams($collection)
    {
        return [
            'uuid' => \Str::uuid(),
            'firstname' => $collection->firstname,
            'lastname' => $collection->lastname,
            'email' => $collection->email,
            'phone' => $collection->phone,
            'birthday' => $collection->birthday ?? null,
            'gender' => $collection->gender ?? 'male',
            'ip_address' => request()->ip(),
            'active' => $collection->active ?? 0,
            'password' => bcrypt($collection->password),
        ];
    }


}
