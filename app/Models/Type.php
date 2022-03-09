<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)
            ->withPivot('id')
            ->using(AttributeType::class);
    }

    public function attribute_types()
    {
        return $this->hasMany(AttributeType::class);
    }

//    public function values()
//    {
//        return $this->hasManyThrough(
//            AttributeTypeValue::class,
//            AttributeType::class,
//            'type_id',
//            'attribute_type_id',
//            'id'
//        );
//    }
}
