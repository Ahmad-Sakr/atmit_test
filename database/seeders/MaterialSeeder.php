<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Material::query()->insert([
            ['type_id' => 1, 'title' => 'Wood Board 1'],
            ['type_id' => 1, 'title' => 'Wood Board 2'],
            ['type_id' => 1, 'title' => 'Wood Board 3'],
            ['type_id' => 2, 'title' => 'Light 1'],
            ['type_id' => 2, 'title' => 'Light 2'],
            ['type_id' => 2, 'title' => 'Light 3'],
        ]);

        $material = Material::query()->where('id', 1)->first();
        $material->values()->attach([1,4,6]);

        $material = Material::query()->where('id', 2)->first();
        $material->values()->attach([1,5,6]);

        $material = Material::query()->where('id', 3)->first();
        $material->values()->attach([2,5,7]);

        $material = Material::query()->where('id', 4)->first();
        $material->values()->attach([8,11]);

        $material = Material::query()->where('id', 5)->first();
        $material->values()->attach([9,11]);

        $material = Material::query()->where('id', 6)->first();
        $material->values()->attach([9,12]);
    }
}
