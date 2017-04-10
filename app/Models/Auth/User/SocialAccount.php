<?php

namespace App\Models\Auth\User;

use App\Models\Auth\User\Traits\Relations\SocialAccountRelations;
use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    use SocialAccountRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'social_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'provider', 'provider_id', 'token', 'avatar'];
}
