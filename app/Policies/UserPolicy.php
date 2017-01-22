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

    public function manage_material(User $user)
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

    public function manage_myShop(User $user)
    {
        if ($user->department_id == 1)
            return true;
        else
            return false;

    }

    public function manage_status(User $user)
    {
        if ($user->department_id > 4)
            return true;
        else
            return false;
    }

    public function check_order(User $user)
    {
        if($user->department_id > 4)
            return true;
        else
            return false;
    }

    public function manage_order(User $user)
    {
        if($user->department_id == 1)
            return true;
        else
            return false;
    }

    public function manage_sale(User $user)
    {
        if ($user->department_id == 2 )
            return true;
        else
            return false;
    }




    
}
