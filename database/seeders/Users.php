<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Admin
        DB::table('users')->insert([
           'name'=> 'admin',
           'email'=>'admin@admin.admin',
           'password'=>Hash::make('adminadmin'),
           'is_admin' =>'1',
        ]);
        DB::table('users')->insert([
           'name'=> 'admin',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('adminadmin'),
           'is_admin' =>'1',
        ]);

        //User
        DB::table('users')->insert([
           'name'=> 'user',
           'email'=>'user@user.user',
           'password'=>Hash::make('useruser'),
           'is_admin' =>'0',
        ]);
        DB::table('users')->insert([
           'name'=> 'user',
           'email'=>'user@gmail.com',
           'password'=>Hash::make('useruser'),
           'is_admin' =>'0',
        ]);
    }
}
