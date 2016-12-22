<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function manage_user(User $user)
    {
        if($user->role_id > 4)
            return true;
        else
            return false;
    }

    public function manage_shop(User $user)
    {
        if($user->department_id > 4)
            return true;
        else
            return false;
    }


    public function import_province(User $user)
    {
        if($user->department_id > 4)
            return true;
        else
            return false;
    }

    public function import_material(User $user)
    {
        if($user->department_id >4)
            return true;
        else
            return false;
    }

}
