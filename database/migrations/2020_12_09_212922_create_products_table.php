<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

//            $table->string('imagename');
            $table->unsignedBigInteger('product_type_id');
            $table->string('product_name', 250);
            $table->unsignedBigInteger('price');
            $table->string('product_screen_size');
            $table->string('product_processor');
            $table->string('product_storage');
            $table->timestamps();
        });

        Schema::table('products', function(Blueprint $table) {
            $table->foreign('product_type_id')->references('id')->on('product_types')
                ->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
