<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNlicValidationsTable extends Migration
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
        Schema::create('nlic_validations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->timestamp('ttl');
            $table->longText('validation_result');

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('user_id','nlic_validations_foreign_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->unique('user_id', 'unique_user');
            $table->index('ttl');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nlic_validations', function (Blueprint $table) {
            $table->dropForeign('nlic_validations_foreign_user');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('nlic_validations');
    }
}
