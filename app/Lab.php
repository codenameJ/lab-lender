<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $primaryKey = 'Lab_id';

    protected $fillable = [
        'Class_Name','Professor_Name',
    ];
}
