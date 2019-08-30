<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('categories_id');
            $table->string('title');
            $table->string('image')->default(0);
            $table->string('author');
            $table->string('website');
            $table->string('link');
            $table->text('meta_description');
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
        Schema::dropIfExists('news');
    }
}
