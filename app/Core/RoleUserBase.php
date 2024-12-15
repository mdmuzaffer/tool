<?php

namespace App\Core;

use App\Role;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

trait RoleUserBase
{

    //relation Roles
    public function Roles()
    {
        return $this->belongsToMany(Role::class);
    }

    //util
    public function hasRole(string $role)
    {
        return $this->Roles()->where('role', "=", $role)->count() > 0;
    }

    //util
    public function isValidRole(string $role)
    {
        return Role::where('role', "=", $role)->whereIn('for', Role::mappedByClass(get_class($this)))->count() > 0;
    }

    //util
    public function addRole(string $role)
    {
        if ($this->isValidRole($role)) {
            if (!$this->hasRole($role)) {
                $rolex = Role::where('role', "=", $role)->whereIn('for', Role::mappedByClass(get_class($this)))->first();
                $this->Roles()->attach($rolex);
                return true;
            }
        }

        return false;
    }

    //util
    public function removeRole(string $role)
    {
        if ($this->hasRole($role)) {
            $rolex = Role::where('role', "=", $role)->whereIn('for', Role::mappedByClass(get_class($this)))->first();
            $this->Roles()->detach($rolex);
            return true;
        }
        return false;
    }

    //util
    public function allRoles()
    {
        return Role::whereIn('for', Role::mappedByClass(get_class($this)))->get();
    }

    //util
    public function makeSuperUser($su = true)
    {
        $isAdmin = in_array("Admin", Role::mappedByClass(get_class($this)));
        if ($isAdmin && $su) {
            $this->su = true;
            $this->save();
            $this->Roles()->sync($this->allRoles()->pluck('id')->toArray());
        } else {
            $this->su = false;
            $this->save();
            $this->Roles()->sync([]);
        }
        $this->refresh();
    }

    //util
    public function isSu()
    {
        return string_boolify($this->su);
    }


    #mutator user_type_name
    public function getUserTypeNameAttribute()
    {
        $className = get_class($this);
        $p = explode("\\", $className);
        return last($p);
    }

    public function getRoleUrl(Authenticatable $currentUser)
    {
        if ($currentUser->user_type_name == "Admin") {
            return  route('admin.auth.user.get', [
                'type' => $this->user_type_name,
                'id' => $this->id,
            ]);
        }
    }


    #mutator user_type_class
    public function getUserTypeClassAttribute()
    {
        $className = get_class($this);
        return $className;
    }
}
