<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class SetupAccessTables.
 */
class SetupAccessTables extends Migration
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
            $table->boolean('is_admin')->default(false);
            $table->smallInteger('weight')->default(0)->unsigned();
            $table->timestamps();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('name', 'unique_name');
        });

        /**
         * User and roles relation table
         */
        Schema::create('user_roles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('role_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id', 'foreign_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('role_id', 'foreign_role')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->unique(['user_id', 'role_id']);
        });

        /**
         * Permissions table
         */
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name');
            $table->smallInteger('weight')->default(0)->unsigned();
            $table->timestamps();

            /*
             * Add Foreign/Unique/Index
             */
            $table->unique('name', 'unique_name');
        });

        Schema::create('role_permissions', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('permission_id', 'foreign_permission')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id', 'foreign_role')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
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

        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropForeign('foreign_user');
            $table->dropForeign('foreign_role');
        });

        Schema::table('permissions', function (Blueprint $table) {
            $table->dropUnique('unique_name');
        });

        Schema::table('role_permissions', function (Blueprint $table) {
            $table->dropForeign('foreign_role');
            $table->dropForeign('foreign_permission');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('user_roles');
        Schema::dropIfExists('role_permissions');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('permissions');
    }
}
