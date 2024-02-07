<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PantsMeasurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'pants_quantity',
        'cut_belt',
        'long_belt',
        'side_pocket',
        'side_cross_pocket',
        'plit',
        'without_plit',
        'back_pocket',
        'watch_pocket',
        'length_measurement',
        'length_notes',
        'inside_length_measurement',
        'inside_length_notes',
        'waist_measurement',
        'waist_notes',
        'hips_measurement',
        'hips_notes',
        'fly_measurement',
        'fly_notes',
        'thai_measurement',
        'thai_notes',
        'lower_thai_measurement',
        'lower_thai_notes',
         'knee_measurement',
         'knee_notes',
         'calfs_measurement',
         'calfs_notes',
         'bottom_measurement',
         'bottom_notes',
         'add_notes',
         'image_1',
         'image_2',
         'image_3',
         'is_delete'
        
    ];
}
