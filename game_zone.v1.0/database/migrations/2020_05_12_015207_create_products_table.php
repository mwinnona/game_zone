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
            $table->string('name', 115)->nullable();
            $table->string('description', 400)->nullable();
            $table->integer('type_product')->nullable();
            $table->integer('plataform')->nullable();
            $table->integer('gender')->nullable();
            $table->float('price')->nullable();
            $table->string('image', 115)->nullable();
            $table->date('release_date')->nullable();
            $table->boolean('status')->default(1);
            $table->integer('stock')->nullable();
            $table->string('token_product',115)->nullable();
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
        Schema::dropIfExists('products');
    }
}
