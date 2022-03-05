<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    private $categories = [
        'Back',
        'Biceps',
        'Calves',
        'Cardio',
        'Chest',
        'Core',
        'Forearms',
        'Full Body',
        'Glutes',
        'Legs',
        'Olympic',
        'Other',
        'Shoulders',
        'Triceps',
      ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        foreach ($this->categories as $category) {
            $categories[] = ["name" => $category];

            Category::firstOrCreate(
                ["name" => $category],
            );
        }
    }
}
