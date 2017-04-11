<?php

namespace App\Models\Auth\User\Traits\Scopes;

use Arcanedev\Support\Bases\Model;

trait UserScopes
{
    /**
     * Fetch users by a given role id or role name value.
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @param $role
     * @return mixed
     */
    public function scopeWhereRole($query, $role)
    {
        if ($role instanceof Model) $role = $role->getKey();

        $query->whereHas('roles', function ($query) use ($role) {
            /** @var $query \Illuminate\Database\Query\Builder */
            $query->orWhere('id', $role)->orWhere('name', $role);
        });

        return $query;
    }
}
