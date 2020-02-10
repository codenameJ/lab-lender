<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_detail extends Model
{
    protected $primaryKey = 'Detail_id';

    protected $fillable = [
        'Equip_Num','Request_id', 'Equip_id',
    ];
}
