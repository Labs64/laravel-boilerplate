<?php

namespace App\Models\Auth\Permission;

use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Permission\Traits\Relations\PermissionRelations;


class Permission extends Model
{
    use PermissionRelations;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'weight'];

}
