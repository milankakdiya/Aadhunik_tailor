<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'store_code',
        'name',
        'phone_number',
        'image',
        'add',
        'is_delete'
    ];
}
