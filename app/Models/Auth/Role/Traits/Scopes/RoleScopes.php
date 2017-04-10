<?php

namespace App\Models\Auth\Role\Traits\Scopes;

trait RoleScopes
{
    /**
     * Sort records by weight.
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @param string $direction
     *
     * @return mixed
     */
    public function scopeSort($query, $direction = 'asc')
    {
        return $query->orderBy('weight', $direction);
    }
}
