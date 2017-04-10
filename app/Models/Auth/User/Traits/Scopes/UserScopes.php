<?php

namespace App\Models\Auth\User\Traits\Scopes;

trait UserScopes
{
    /**
     * Fetch records that are belong to users by a given confirmed value.
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @param bool $confirmed
     *
     * @return mixed
     */
    public function scopeWhereConfirmed($query, $confirmed = true)
    {
        return $query->where('confirmed', $confirmed);
    }

    /**
     * Fetch records that are belong to users by a given active value.
     *
     * @param $query \Illuminate\Database\Eloquent\Builder
     * @param bool $status
     *
     * @return mixed
     */
    public function scopeWhereActive($query, $status = true)
    {
        return $query->where('status', $status);
    }
}
