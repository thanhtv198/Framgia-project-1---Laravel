<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('price');
            $table->text('description')->nullable();
            $table->string('promotion')->nullable();
            $table->date('date_manufacture')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('manufacture_id')->unsigned();
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');
            $table->text('color')->nullable();
            $table->string('screen')->nullable();
            $table->string('os')->nullable();
            $table->float('back_camera')->nullable();
            $table->float('front_camera')->nullable();
            $table->integer('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('sim')->nullable();
            $table->integer('memory')->nullable();
            $table->integer('battery')->nullable();  
            $table->integer('status');                       
            $table->text('check')->nullable();
            $table->integer('views');
            $table->integer('remove');
            $table->rememberToken();
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
