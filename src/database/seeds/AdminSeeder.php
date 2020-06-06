<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin&%@cv..'),
            'avatar'   => '/admin_panel/avatar/avatar.png'
        ]);
    }
}
