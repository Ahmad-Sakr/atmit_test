<?php

use App\Http\Controllers\SearchController;
use App\Models\Material;
use App\Models\Type;
use App\Models\Attribute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

//    $material = Material::query()->where('id', 1)->first();
//    $values = $material->type->attribute_types[0]->values()->get()->pluck(['id'])->toArray();
//    $material->values()->attach($values);
//    dd('Done');


//    $types = Type::query()->;
//    $attributes = Attribute::all();

//    $type = Type::firstOrFail();
//    dd($type->attribute_types[0]->values);

//    $types = Type::query()->with(['attributes' => function($query) {
//        dd($query->using);
//    }])->get();

//    $types = Type::query()->with('attributes')->get();

    $types = Type::query()->with('attribute_types.attribute', 'attribute_types.values')->get();

    $materials = Material::query()->with(['type', 'values'])->get();

    return view('welcome', compact('types', 'materials'));
});

Route::get('/result', [SearchController::class, 'index']);
