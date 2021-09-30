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
        //
        \App\User::create([
            'username'    => 'admin',
            'email'    => 'admin@aw.com',
            'password'    => bcrypt('admin')
    ]);
    }
}
