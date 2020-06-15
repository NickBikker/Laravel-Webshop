<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('imagepath');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('category_id');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productens');
    }
}

