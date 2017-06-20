<?php
namespace App\Models\Auth\User\Traits\Ables;


trait Protectable
{
    public function hasAccess($productModuleNumber)
    {
        //skip if user has except roles
        $exceptRoles = config('protection.except_roles');
        if ($exceptRoles && $this->hasRoles($exceptRoles)) return true;

        return app('netlicensing')->validate($this)->isValid($productModuleNumber);
    }
}