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
        DB::table('users')->insert(
            [
            'username' => '山田太郎',
            'mail' => 'yamada@gmail.com',
            'password' => bcrypt('password'),]
        );
            }
}
