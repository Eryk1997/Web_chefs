<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        for ($i=0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => Str::random(10),
                'lastname' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),// password
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
