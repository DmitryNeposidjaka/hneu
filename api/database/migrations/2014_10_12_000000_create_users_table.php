<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('moodle_id')->nullable();
            $table->string('student_hid')->unique()->nullable();
            $table->string('student_sid')->unique()->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('username')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('telephone')->nullable();
            $table->string('moodle_token')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('lang', 5)->nullable();
            $table->string('thumbnail')->nullable();
            $table->json('group')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
