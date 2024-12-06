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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug', 150)->unique();
            $table->text('short_description')->nullable();
            $table->text('description');
            $table->double('price', 12, 2);
            $table->double('sell_price', 12, 2);
            $table->boolean('availability')->default(1);
            $table->integer('stocks')->nullable();
            $table->longText('image')->nullable();
            $table->date('published_date');
            $table->float('offer_percentage', 8, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // pivot table

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
