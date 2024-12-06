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
        Schema::create('promocodes', function (Blueprint $table) {
            $table->id();
            $table->string('promocode',30);
            $table->double('discount',8,2);
            $table->date('expire_from');
            $table->date('expire_to');
            $table->integer('product_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // promo code -- category pivot table
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promocodes');
    }
};
