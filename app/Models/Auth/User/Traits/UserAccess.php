<?php

namespace App\Models\Auth\User\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

trait UserAccess
{
    /**
     * Checks if the user has a role.
     *
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        if ($role instanceof Model) $role = $role->getKey();

        if ($this->roles->isEmpty()) return false;

        return ($this->roles->contains('id', null, $role) || $this->roles->contains('name', null, $role));
    }

    /**
     * Checks if the user has a roles.
     *
     * @param $roles
     * @param bool $all
     * @return bool|int
     */
    public function hasRoles($roles, $all = false)
    {
        if ($roles instanceof Model) $roles = $roles->getKey();

        if ($roles instanceof Collection) $roles = $roles->modelKeys();

        $roles = !is_array($roles) ? [$roles] : $roles;

        $hasRoles = 0;

        foreach ($roles as $role) {
            if ($this->hasRole($role)) $hasRoles++;
        }

        return ($all) ? ($hasRoles == count($roles)) : ($hasRoles);
    }

    /**
     * Checks if the user has a super role with all permissions.
     *
     * @return mixed
     */
    public function hasSuperRole()
    {
        return $this->roles->contains('super', null, true);
    }

    /**
     * Check if user has a permission.
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        if ($permission instanceof Model) $permission = $permission->getKey();

        if ($this->roles->isEmpty()) return false;

        foreach ($this->roles as $role) {
            if ($role->permissions->contains('id', null, $permission) || $role->permissions->contains('name', null, $permission)) return true;
        }

        return false;
    }

    /**
     * Check if user has a permissions.
     *
     * @param $permissions
     * @param bool $all
     * @return bool|int
     */
    public function hasPermissions($permissions, $all = false)
    {
        if ($this->hasSuperRole()) return true;

        if ($permissions instanceof Model) $permissions = $permissions->getKey();

        if ($permissions instanceof Collection) $permissions = $permissions->modelKeys();

        $permissions = !is_array($permissions) ? [$permissions] : $permissions;

        $hasPermissions = 0;

        foreach ($this->roles as $role) {
            foreach ($permissions as $permission) {
                if ($this->hasPermission($permission)) $hasPermissions++;
            }
        }

        return ($all) ? ($hasPermissions == count($permissions)) : ($hasPermissions);
    }
}
