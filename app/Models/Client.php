<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $with = [
        'elements'
    ];

    public function elements()
    {
        return $this->hasMany(ClientElement::class,'client_id');
    }
}
