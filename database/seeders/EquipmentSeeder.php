<?php

namespace Database\Seeders;

use App\Models\Equipment;
use Illuminate\Database\Seeder;

class EquipmentSeeder extends Seeder
{
    private $equipments = [
        'Band',
        'Barbell',
        'Bodyweight',
        'Cable',
        'Dumbbell',
        'EZ Bar',
        'Kettlebell',
        'Machine',
        'Smith Machine',
        'Other',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->equipments as $equipment) {
            Equipment::firstOrCreate(
                ["name" => $equipment],
            );
        }
    }
}
