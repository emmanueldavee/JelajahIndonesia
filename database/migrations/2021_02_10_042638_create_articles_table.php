<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');

            $table->string('title');
            $table->longText('description');
            $table->string('image');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); 
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
