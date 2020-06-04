<?php

use Database\traits\DisableForeignKeys;
use Database\traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    use DisableForeignKeys;
    use TruncateTable;

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
