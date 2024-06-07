<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'archology',
            'biometrics',
            'blockchain',
            'exocortex',
            'magnonics',
            'neuromophic engineering',
            'three-dimensionals integrated circuit',
            'twistronics'
        ];

        foreach ($technologies as $key => $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($technology , '-');
            $newTechnology->save();
        }
    }
}
