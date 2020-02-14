<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function(Blueprint $table) {
            if (!Schema::hasColumn('bookings', 'customer_id')) {
                $table->integer('customer_id')->unsigned()->nullable();
                $table->foreign('customer_id', '110461_5a676fa2321c7')->references('id')->on('customer')->onDelete('cascade');
                }
                if (!Schema::hasColumn('bookings', 'package_id')) {
                $table->integer('package_id')->unsigned()->nullable();
                $table->foreign('package_id', '110461_5a676fa239ffd')->references('id')->on('package')->onDelete('cascade');
                }
                
        });//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function(Blueprint $table) {
            
        });
        //
    }
}
