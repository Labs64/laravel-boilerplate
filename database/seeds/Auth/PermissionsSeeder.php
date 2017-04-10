<?php

use Database\Traits\TruncateTable;
use Database\Traits\DisableForeignKeys;

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PermissionsSeeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncateMultiple(['permissions', 'permissions_roles']);

        /**
         * Don't need to assign any permissions to administrator because the super flag is set to true
         * in RoleSeeder.php.
         */

        /**
         * Misc Access Permissions.
         */
        $permission_model = config('access.permission');
        $viewBackend = new $permission_model();
        $viewBackend->name = 'view-backend';
        $viewBackend->display_name = 'View Backend';
        $viewBackend->sort = 1;
        $viewBackend->created_at = Carbon::now();
        $viewBackend->updated_at = Carbon::now();
        $viewBackend->save();

        $this->enableForeignKeys();
    }
}