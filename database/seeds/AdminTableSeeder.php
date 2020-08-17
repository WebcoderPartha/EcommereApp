<?php

use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'phone'     => '01710147887',
            'password'  => Hash::make('123456')
        ]);

    }
}
