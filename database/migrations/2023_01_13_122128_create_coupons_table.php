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
        Schema::create('coupons', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('coupon_code')->unique();
            $table->string('coupon_value');
            $table->enum('coupon_type', ['percentage', 'flat_value'])->default('percentage');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->date('expiry_at');
            $table->boolean('is_used')->default(0);
            $table->string('slug', 100)->uniqid();

            $table->softDeletes();
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
        Schema::dropIfExists('coupons');
    }
};
