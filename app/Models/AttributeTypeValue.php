<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeTypeValue extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    protected $table = 'attribute_type_values';

    public function attribute_type()
    {
        return $this->belongsTo(AttributeType::class, 'attribute_type_id', 'id');
    }
}
