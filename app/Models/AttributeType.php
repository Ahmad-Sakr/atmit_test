<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AttributeType extends Pivot
{
    use HasFactory;

    protected $table = 'attribute_type';
//    protected $with = ['values'];

    public function attribute() {
        return $this->belongsTo(Attribute::class);
    }

    public function type() {
        return $this->belongsTo(Type::class);
    }

    public function values()
    {
        return $this->hasMany(AttributeTypeValue::class, 'attribute_type_id', 'id');
    }
}
