<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $types = Type::query()->with('attribute_types.attribute', 'attribute_types.values')->get();
        return view('search', compact('types'));
    }

    public function search(Request $request)
    {
        $builder = Material::query()->with(['type', 'values.attribute_type.attribute']);

        //Add type Filter
        $type = $request->input('type', '');
        if($type !== '') {
            $builder->whereHas('type', function($query) use ($type) {
                            $query->where('title', $type);
                        });
        }

        //Add Attributes Filter
        $attributes = $request->input('attribute', []);
        $values = $request->input('value', []);
        foreach ($attributes as $attribute) {
            if(array_key_exists($attribute, $values)) {
                $value = $values[$attribute];
                $builder->whereHas('values', function($query) use ($attribute, $value) {
                            $query->where('value', $value)
                                ->whereHas('attribute_type.attribute', function ($query) use ($attribute) {
                                    $query->where('title', $attribute);
                                });
                        });
            }
        }

        $materials = $builder->get();
        return view('result', compact('materials'));
    }
}
