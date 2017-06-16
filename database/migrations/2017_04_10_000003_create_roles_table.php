<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Roles table
         */
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->smallInteger('weight')->default(0)->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('name', 'unique_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*
         * Remove Foreign/Unique/Index
         */
        Schema::table('roles', function (Blueprint $table) {
            $table->dropUnique('unique_name');
        });

        Schema::dropIfExists('roles');
    }
}
