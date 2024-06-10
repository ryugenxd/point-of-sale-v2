<?php
namespace App\Services;

use App\Models\User;
use App\Models\Role;

class UsersService {
    public  static function counter(): array
    {
        $roles = Role::get()->all();
        $users = [];
        foreach ($roles as $role){
            array_push($users,["name"=>$role->name,"count"=>User::where('role_id',$role->id)->count()]);
        }
        return $users;
    }

    public static function roles(): array
    {
        $roles = [];
        foreach(Role::get()->all() as $role){
            array_push($roles,$role->name);
        }
        return $roles;
    }
}
