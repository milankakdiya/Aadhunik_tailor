<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'customer_id',
        'customer_name',
        'customer_number',
        'front_image',
        'back_image',
        'side_image',
        'notes',
        'is_delete'
    
    ];
}
