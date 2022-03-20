<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();
        $restaurants = Restaurant::all();
        $index = 0;
        foreach ($users as $user) {
            if($index == 3)
                $index = 0;
            $user->restaurants()->attach($restaurants[$index]);
            $index++;
        }
    }
}
