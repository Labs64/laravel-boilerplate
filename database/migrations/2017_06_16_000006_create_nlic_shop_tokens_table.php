<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNlicShopTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * User and roles relation table
         */
        Schema::create('nlic_shop_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('number');
            $table->timestamp('expires');
            $table->string('shop_url');

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id', 'nlic_st_foreign_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique('user_id', 'unique_user');
            $table->index('number');
            $table->index('expires');
            $table->index('shop_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nlic_shop_tokens', function (Blueprint $table) {
            $table->dropForeign('nlic_shop_tokens');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('nlic_shop_tokens');
    }
}
