<?php

namespace App\Models\Auth\User\Traits\Relations;

use App\Models\Auth\Permission\Permission;
use App\Models\Auth\Role\Role;
use App\Models\Auth\User\SocialAccount;
use App\Models\Auth\User\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait SocialAccountRelations
{
    /**
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
