<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtectionShopTokensTable extends Migration
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
        Schema::create('protection_shop_tokens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('number');
            $table->timestamp('expires');
            $table->string('success_url');
            $table->string('cancel_url');
            $table->string('success_url_title');
            $table->string('cancel_url_title');
            $table->string('shop_url');

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id', 'pst_foreign_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->index('number');
            $table->index('expires');
            $table->unique(['user_id'], 'pst_unique_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('protection_shop_tokens', function (Blueprint $table) {
            $table->dropForeign('pst_foreign_user');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('protection_shop_tokens');
    }
}
