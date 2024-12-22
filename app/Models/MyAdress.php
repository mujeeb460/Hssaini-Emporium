<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyAdress extends Model
{
    use HasFactory;

     protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'city',
        'area',
        'shipping_address',
        'user_id',
        'status'
    ];
}
