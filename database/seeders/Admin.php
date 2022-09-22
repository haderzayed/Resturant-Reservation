<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class Admin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'addmin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
            'is_admin'=>1,
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10)

        ]);
    }
}
