<?php
use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
      
        $this->truncate('categories');

        $categories = [
            [
                'name' => 'Pelajar Sekolah/IPT (MyKad)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],

            [
                'name' => 'Dewasa (MyKad)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],
            [
                'name' => 'Pelajar Sekolah/IPT (Tanpa MyKad)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],
            [
                'name' => 'Dewasa (Tanpa MyKad)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                
            ],
        ];

        DB::table('categories')->insert($categories);

        $this->enableForeignKeys();

        //
    }
}
