<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
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
            $table->string('type', 20);
            $table->string('link');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->integer('creator_id');
            $table->string('entity');
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->string('lang', 20);
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['type', 'lang', 'link'], 'unique_news_index');
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
