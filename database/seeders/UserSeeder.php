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
            "username" => "TahaZare",
            "display_name" => "Taha Zare",
            "mobile" => 9333134032,
            "email" => "Tahaazre@gmail.com",
            "user_type" => 2,
            "ban" => 0,
            'password' => Hash::make(rand(10, 100)),
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
