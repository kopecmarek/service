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
            $table->string('price')->nullable()->change(); //admin can edit this filed
            $table->string('total')->nullable()->change(); //admin can edit this filed
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
            $table->string('price')->nullable(false)->change(); //admin can edit this filed
            $table->string('total')->nullable(false)->change(); //admin can edit this filed
        });
    }
}
