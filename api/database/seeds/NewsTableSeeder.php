<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\News::class, 2)->state('article')->create();
        factory(\App\Models\News::class, 2)->state('advertising')->create();
        factory(\App\Models\News::class, 2)->state('message')->create();
    }
}
