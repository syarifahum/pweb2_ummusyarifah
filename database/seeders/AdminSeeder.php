<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        //admin user
        User::create([
            'name'=>'Admin',
            'email'=>'admin@email.com',
            'email_verified_at'=>now(),
            'password'=> bcrypt('password'), //password is 'password'
            'is_admin'=>true,

        ]);

        //dosen user
        User::create([
            'name'=>'Test',
            'email'=>'test@email.com',
            'email_verified_at'=>now(),
            'password'=> bcrypt('password'), //password is 'password'
            'is_admin'=>false,

        ]);
    }
}
