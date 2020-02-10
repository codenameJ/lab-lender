<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ta extends Model
{
    protected $primaryKey = 'TA_id';

    protected $fillable = [
        'TA_Name', 'Lab_id', 'client_id',
    ];

    public function User(){
        return $this->belongsTo(User::class,'User_id');
    }
}
