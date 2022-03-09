<?php

namespace App\Http\Controllers;

use App\Models\Material;

class SearchController extends Controller
{
    //Light with Color: Off White
    //Wood Board with Length: 110
    //Wood Board with Length: 120 and Color: White

    public function index()
    {
        $materials = Material::query()
            ->with(['type', 'values.attribute_type.attribute'])
            ->whereHas('type', function($query) {
                $query->where('title', 'Wood Board');
            })
            ->whereHas('values', function($query) {
                $query->where('value', 110)
                        ->whereHas('attribute_type.attribute', function ($query) {
                            $query->where('title', 'Length');
                        });
            })
            ->whereHas('values', function($query) {
                $query->where('value', 60)
                    ->whereHas('attribute_type.attribute', function ($query) {
                        $query->where('title', 'Width');
                    });
            })
            ->get();
        return view('result', compact('materials'));
    }
}
