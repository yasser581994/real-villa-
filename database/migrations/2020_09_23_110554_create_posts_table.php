<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
    
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->json('name')->nullable();
            $table->json('content')->nullable();
            $table->string('image')->nullable();
            $table->string('price')->nullable();
            $table->string('period')->nullable();
            $table->string('price_metter')->nullable();
            $table->string('number_of_floors')->nullable();
            $table->string('number_of_flats')->nullable();
            $table->string('size')->nullable();
            $table->string('year_of_build')->nullable();
            $table->json('address')->nullable();
            $table->string('rooms')->nullable();
            $table->string('badrooms')->nullable();
            $table->boolean('garage')->nullable();
            $table->boolean('gas')->nullable();
            $table->boolean('evelador')->nullable();
            $table->string('floor')->nullable();
            $table->boolean('hot')->nullable();
            $table->string('slug');
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
        Schema::dropIfExists('posts');
    }
}
