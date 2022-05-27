<?php

namespace Database\Seeders\Auth;

use Database\Traits\TruncateTable;
use Database\Traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
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
        $this->truncate('roles');

        $roles = [['name' => 'administrator'], ['name' => 'authenticated']];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
    }
}
