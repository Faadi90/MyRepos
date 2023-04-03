<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    public $timestamps=false;

    // accessors:
    public function getNameAttribute($value)
    {
        return strtoupper($value);
    }

    // mutators:
    public function setNameAttribute($value)
    {
        return $this->attributes['name'] = 'Mr '.$value;
    }
}
