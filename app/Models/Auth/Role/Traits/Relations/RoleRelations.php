<?php

namespace App\Models\Auth\Role\Traits\Relations;

use App\Models\Auth\Permission\Permission;
use App\Models\Auth\User\User;

trait RoleRelations
{
    /**
     * Relation with users
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id');
    }

    /**
     * Relation with permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }
}
