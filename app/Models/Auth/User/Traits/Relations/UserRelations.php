<?php

namespace App\Models\Auth\User\Traits\Relations;

use App\Models\Auth\Role\Role;
use App\Models\Auth\User\SocialAccount;
use App\Models\Protection\ProtectionShopToken;
use App\Models\Protection\ProtectionValidation;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait UserRelations
{
    /**
     * Relation with role
     *
     * @return BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'users_roles', 'user_id', 'role_id');
    }

    /**
     * Relation with social provider
     *
     * @return HasMany
     */
    public function providers()
    {
        return $this->hasMany(SocialAccount::class);
    }

    /**
     * Relation with protection validation
     *
     * @return mixed
     */
    public function protectionValidation()
    {
        return $this->hasOne(ProtectionValidation::class);
    }

    /**
     * Relation with protection shop tokens
     *
     * @return mixed
     */
    public function protectionShopTokens()
    {
        return $this->hasMany(ProtectionShopToken::class);
    }
}
