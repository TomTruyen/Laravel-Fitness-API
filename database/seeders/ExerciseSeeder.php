<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Exercise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $exercises = json_decode(File::get("database/data/exercises.json"), true);

        foreach ($exercises as $exercise) {
            if($exercise['equipment'] == '' || $exercise['equipment'] == null) {
                $exercise['equipment'] = "None";
            }

            Exercise::firstOrCreate(
                [
                    'name' => $exercise['name'],
                    'category' => $exercise['category'],
                    'equipment' => $exercise['equipment'],
                    'type' => $exercise['type'],
                    'image' => $exercise['image'],
                    'image_detail' => $exercise['image_detail'],
                ],
            );
        }
    }
}
