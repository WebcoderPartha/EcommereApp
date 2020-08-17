<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'       => 'Partha',
           'email'      => 'partha@gmail.com',
            'password'  => Hash::make('p01012000')
        ]);

        User::create([
            'name'       => 'Sohel',
            'email'      => 'sohel@gmail.com',
            'password'  => Hash::make('p01012000')
        ]);
    }
}
