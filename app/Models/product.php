<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    // Fillable column name define here to insert data to db:
    // protected $fillable = ['name','image','detail','status'];
    protected $guarded = [];
}
