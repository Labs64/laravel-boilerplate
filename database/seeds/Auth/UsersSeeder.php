<?php

use Carbon\Carbon as Carbon;
use Database\traits\DisableForeignKeys;
use Database\traits\TruncateTable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
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
        $this->truncate('users');

        $users = [
            [
                'name'              => 'Admin',
                'email'             => 'admin.laravel@labs64.com',
                'password'          => bcrypt('admin'),
                'active'            => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'name'              => 'Demo',
                'email'             => 'demo.laravel@labs64.com',
                'password'          => bcrypt('demo'),
                'active'            => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed'         => true,
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        DB::table('users')->insert($users);

        $this->enableForeignKeys();
    }
}
