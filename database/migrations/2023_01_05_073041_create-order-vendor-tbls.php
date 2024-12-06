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
        Schema::create('ordervendors', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id')->nullable();
            $table->integer('vendor_id')->nullable();
            $table->string('order_status');
            $table->enum('active',[0,1])->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordervendors_');
    }
};
