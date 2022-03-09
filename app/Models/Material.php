<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function values() {
        return $this->belongsToMany(
            AttributeTypeValue::class,
            'material_attribute_values',
            'material_id',
            'attribute_type_value_id'
        )
            ->withPivot('id');
    }
}
