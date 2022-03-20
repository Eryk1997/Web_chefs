<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRestaurants = array('MeatChefs','VegeChefs','BurgerChefs');

        foreach ($arrayRestaurants as $restaurant) {
            DB::table('restaurants')->insert([
                'name' => $restaurant,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }


    }
}
