<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'Equip_id','Equip_Name', 'Equip_Num', 'Lab_id',
    ];
}
