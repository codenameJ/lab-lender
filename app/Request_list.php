<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request_list extends Model
{
    protected $primaryKey = 'request_id';

    protected $fillable = [
        'Student_id','status',
    ];

    public function request_detail(){
        return $this->hasMany(Request_detail::class,'Request_id');
    }

}
