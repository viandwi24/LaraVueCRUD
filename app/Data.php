<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $table = 'coba';
    protected $fillable = [
        'name', 'age', 'address'
    ];
}
