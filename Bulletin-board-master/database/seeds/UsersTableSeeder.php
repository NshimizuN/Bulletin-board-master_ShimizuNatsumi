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
         DB::table('users')->insert([
            'username' => 'いちご',
            'email' => 'ichigo@gmail.com',
            'password' => bcrypt('11111111'),
            'admin_role' => '1',
        ]);
    }
}
