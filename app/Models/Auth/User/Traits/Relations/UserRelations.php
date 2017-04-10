<?php

namespace App\Models\Auth\User\Traits\Relations;

use App\Models\Auth\Permission\Permission;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\SocialAccount;

trait UserRelations
{
    /**
     * Relation with role
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    /**
     * Relation with social provider
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }
}
