<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderEdit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('price', 4, 2)->nullable()->change(); //admin can edit this filed
            $table->decimal('total', 8, 2)->nullable()->change(); //admin can edit this filed
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('price', 4, 2)->nullable(false)->change(); //admin can edit this filed
            $table->decimal('total', 8, 2)->nullable(false)->change(); //admin can edit this filed
        });
    }
}
