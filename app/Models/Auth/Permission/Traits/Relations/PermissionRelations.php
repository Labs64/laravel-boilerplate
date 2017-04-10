<?php

namespace App\Models\Auth\Permission\Traits\Relations;

use App\Models\Auth\Role\Role;

trait PermissionRelations
{
    /**
     * Relation with roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions', 'permission_id', 'role_id');
    }
}
