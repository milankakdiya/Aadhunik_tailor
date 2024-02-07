<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;
    protected $fillable = ['id',
                           'emp_id',
                            'emp_name',
                            'emp_number',
                            'emp_role',
                            'emp_profile_image',
                            'notes',
                            'is_delete'
                        ];
}
