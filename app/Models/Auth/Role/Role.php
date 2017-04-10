<?php

namespace App\Models\Auth\Role;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Role\Traits\Scopes\RoleScopes;
use App\Models\Auth\Role\Traits\Relations\RoleRelations;

class Role extends Model
{
    use RoleScopes,
        RoleRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'super', 'weight'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['permissions'];

}
