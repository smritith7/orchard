<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
   protected $fillable = [
    'product_code, customer_id','phone_no','total','paid','status','date'

   ];
}
