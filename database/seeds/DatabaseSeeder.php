<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //それぞれのシーダーを呼ぶ
        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
    }
}
