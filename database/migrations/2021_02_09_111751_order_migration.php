<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->smallInteger('quantity');
            $table->foreignId('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('price', 4, 2);
            $table->decimal('total', 8, 2);
            $table->string('type', 30);
            $table->string('brand', 15);
            $table->string('model', 20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
