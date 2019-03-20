<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::firstOrCreate([
            'email' => 'dmitryneposidjaka@gmail.com',
            'password' => \Hash::make('secret'),
            'username' => 'adminster',
        ]);
        factory(\App\Models\User::class, 10)->create();
    }
}
