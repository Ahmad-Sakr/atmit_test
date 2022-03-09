<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attribute::query()->insert([
            ['title' => 'Length'],
            ['title' => 'Width'],
            ['title' => 'Color'],
            ['title' => 'Brand']
        ]);
    }
}
