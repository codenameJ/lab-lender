<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $primaryKey = 'Equip_id';

    protected $fillable = [
        'Equip_Name', 'Equip_Num', 'Lab_id',
    ];
}
