<?php

namespace Database\Seeders;

use App\Models\AttributeType;
use App\Models\Type;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::query()->insert([
            ['title' => 'Wood Board'],
            ['title' => 'Light']
        ]);

        AttributeType::query()->insert([
            ['type_id' => 1, 'attribute_id' => 1],
            ['type_id' => 1, 'attribute_id' => 2],
            ['type_id' => 1, 'attribute_id' => 3],
            ['type_id' => 2, 'attribute_id' => 3],
            ['type_id' => 2, 'attribute_id' => 4],
        ]);
    }
}
