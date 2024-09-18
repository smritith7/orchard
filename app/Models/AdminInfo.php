<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdminInfo extends Model
{
    protected $fillable=[
        "user_id",
        "first_name",
        "last_name",
        "gender",
        "phone_no",
        "address",
        "nationality"
    ];

    public function user():BelongsTo {
        return $this->belongsTo(User::class,'user_id');
    }
    public function getFullNameAttribute(){
        $name=$this->first_name;
        if ($this->last_name){
            $name=$name ." ".$this -> last_name;
        }
        return $name;
    }
}
