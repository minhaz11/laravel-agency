<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $with = [
        'elements'
    ];

    public function elements()
    {
        return $this->hasMany(ServiceElement::class,'service_id');
    }
}
