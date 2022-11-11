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
        DB::table('users')->insert([
            'nama' => 'admin',
            'username' => 'admin',
            'no_telp' => '-',
            'img_user' => '-',
            'email' => 'admin'.Str::random(3).'@gmail.com',
            'password' => Hash::make('password'),
            'roles' => 'user'
        ]);
    }
}
