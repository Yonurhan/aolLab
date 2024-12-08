<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;


class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Briyani',
            'description' => 'Spiced rice dish with marinated meat and eggs',
            'image_path' => 'storage/Briyani.png',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Kebab',
            'description' => 'Grilled skewers of meat served with pita bread and vegetables',
            'image_path' => 'storage/Kebab.png',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Nasi Padang',
            'description' => 'Indonesia rice dish with spicy side dishes',
            'image_path' => 'storage/Padang.jpg',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Thai Salad',
            'description' => 'Refreshing salad with a spicy dressing',
            'image_path' => 'storage/Salad.png',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Soto',
            'description' => 'Traditional indonesian soup with meats and vegetables',
            'image_path' => 'storage/Soto.jpg',
            'date' => Carbon::create(2024, 12, 25)
        ]);

        Menu::create([
            'item_type' => 'Rice',
            'food_name' => 'Satay',
            'description' => 'Skewered meat with aromatic spices and eggs',
            'image_path' => 'storage/Satay.jpg',
            'date' => Carbon::create(2024, 12, 25)
        ]);
    }
}
