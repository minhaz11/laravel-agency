<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $with = [
        'elements'
    ];

    public function elements()
    {
        return $this->hasMany(AboutElement::class,'about_id');
    }
}
