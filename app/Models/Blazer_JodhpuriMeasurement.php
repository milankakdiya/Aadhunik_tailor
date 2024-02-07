<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blazer_JodhpuriMeasurement extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'blazer',
        'jodhpuri',
        'length_measurement',
        'length_notes',
        'sleeve_length_measurement',
        'sleeve_length_notes',
        'biceps_measurement',
        'biceps_notes',
        'forearm_measurement',
        'forearm_notes',
        'wrist_measurement',
        'wrist_notes',
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
        'image_3'
    ];
}
