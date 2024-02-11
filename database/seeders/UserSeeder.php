<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'AdminToko',
            'email' => 'AdminToko@gmail.com',
            'password' => Hash::make('Admintoko123'),
            'telepon' => '089712345678',
            'alamat' => 'Jalan pelagan tentara pelajar',
            'role' => 'Admin',
        ]);
    }
}
