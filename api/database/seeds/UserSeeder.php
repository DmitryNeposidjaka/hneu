<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Models\User::firstOrCreate([
            'name' => 'Admin',
            'email' => 'dmitryneposidjaka@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('secret'),
        ]);
    }
}
