<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('phone');
            $table->string('date');
            $table->string('time');
            $table->smallInteger('small_pizza_count')->default(0);
            $table->smallInteger('medium_pizza_count')->default(0);
            $table->smallInteger('large_pizza_count')->default(0);
            $table->text('body');
            $table->string('status')->default('pending');
            $table->timestamps();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('pizza_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
