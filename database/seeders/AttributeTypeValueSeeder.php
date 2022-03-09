<?php

namespace Database\Seeders;

use App\Models\AttributeTypeValue;
use Illuminate\Database\Seeder;

class AttributeTypeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttributeTypeValue::query()->insert([
            ['attribute_type_id' => 1, 'value' => '110'],
            ['attribute_type_id' => 1, 'value' => '120'],
            ['attribute_type_id' => 1, 'value' => '130'],
            ['attribute_type_id' => 2, 'value' => '50'],
            ['attribute_type_id' => 2, 'value' => '60'],
            ['attribute_type_id' => 3, 'value' => 'Black'],
            ['attribute_type_id' => 3, 'value' => 'White'],
            ['attribute_type_id' => 4, 'value' => 'White'],
            ['attribute_type_id' => 4, 'value' => 'Off White'],
            ['attribute_type_id' => 4, 'value' => 'Warm White'],
            ['attribute_type_id' => 5, 'value' => 'Philips'],
            ['attribute_type_id' => 5, 'value' => 'Kingston'],
        ]);
    }
}
