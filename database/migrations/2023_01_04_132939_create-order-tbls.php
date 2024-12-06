<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('user_id');
            $table->double('total_price', 10, 2);
            $table->double('discount', 10, 2);
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
            $table->text('note')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('zipcode')->nullable();
            $table->enum('type', ['home', 'office', 'others'])->default('home');
            $table->text('payment_remarks');
            $table->enum('order_status', [
                'active', 'pending', 'cancelled', 'processing', 'shipped', 'complete', 'review'
            ])->default('pending');

            $table->softDeletes();
            $table->timestamps();
        });
    }


    // order management

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
