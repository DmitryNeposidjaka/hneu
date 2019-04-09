<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertRolesAndAbilities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::table('abilities')->insert([
            ['name' => '*', 'title' => 'super user'],
            ['name' => 'create_user', 'title' => 'create user'],
            ['name' => 'view_user', 'title' => 'view user'],
            ['name' => 'edit_user', 'title' => 'edit user'],
            ['name' => 'create_news', 'title' => 'create news'],
            ['name' => 'view_news', 'title' => 'view news'],
            ['name' => 'edit_news', 'title' => 'edit news'],
            ['name' => 'create_product', 'title' => 'create product'],
            ['name' => 'view_product', 'title' => 'view product'],
            ['name' => 'edit_product', 'title' => 'edit product'],
            ['name' => 'assign_permissions', 'title' => 'assign permissions'],
            ['name' => 'view_permissions', 'title' => 'view permissions'],
            ['name' => 'view_courses', 'title' => 'view courses'],
            ['name' => 'can_login', 'title' => 'can login'],
        ]);

        \Illuminate\Support\Facades\DB::table('roles')->insert([
            ['name' => 'superadmin', 'title' => 'Superadmin'],
            ['name' => 'admin', 'title' => 'Admin'],
            ['name' => 'student', 'title' => 'Student'],
            ['name' => 'headman', 'title' => 'Headman'],
            ['name' => 'recruteur', 'title' => 'Recruteur'],
            ['name' => 'teacher', 'title' => 'Teacher'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
