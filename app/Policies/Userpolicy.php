<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class Userpolicy
{
    use HandlesAuthorization;




    public function view(User $user)
    {
        if ($user['id'] % 2 == 1){
            return true;
        }else{
            return false;


        }
    }

    public function crud(User $user)
    {
        if ($user['id'] % 2 == 0){
            return true;
        }else{
            return false;


        }
    }

    public function edit(User $user , User $CurrentUser)
    {
        return $user['id']==$CurrentUser['id'];

    }
}
