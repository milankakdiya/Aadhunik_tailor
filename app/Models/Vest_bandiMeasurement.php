<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vest_bandiMeasurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'vest_coat',
        'bandi',
        'length_measurement',
        'length_notes',
        'sholders_measurement',
        'sholders_notes',
        'chest_measurement',
        'chest_notes',
        'waist_measurement',
        'waist_notes',
        'hips_measurement',
        'hips_notes',
        'collar_measurement',
        'collar_notes',
        'pocket_measurement',
        'pocket_notes',
        'add_notes',
        'image_1',
        'image_2',
        'image_3',
        'is_delete'
    ];
}
