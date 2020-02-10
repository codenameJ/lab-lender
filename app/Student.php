<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'Student_Name','Student_id', 'client_id',
    ];

    public function User(){
        return $this->belongsTo(User::class,'User_id');
    }


}
