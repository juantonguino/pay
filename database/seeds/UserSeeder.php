<?php

use Illuminate\Database\Seeder;

use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'name'=>'admin',
          'email'=>'admin@admin',
          'password'=>bcrypt('admin'),
        ]);
    }
}
