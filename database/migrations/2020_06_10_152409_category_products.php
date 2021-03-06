<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CategoryProducts extends Migration
{
    /**
     * Run the migrations.++
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_products', function (Blueprint $table){
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('product_id');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('product_id')->references('id')->on('products');

            $table->primary(['category_id', 'product_id']);

        });
    }

    /**??
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
