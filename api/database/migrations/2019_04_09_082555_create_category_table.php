<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
        });
        Schema::create('products_categories', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('product_id');
        });
        Schema::create('news_categories', function (Blueprint $table) {
            $table->integer('category_id');
            $table->integer('news_id');
        });
    }

    /**cth
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_categories');
        Schema::dropIfExists('products_categories');
        Schema::dropIfExists('categories');
    }
}
