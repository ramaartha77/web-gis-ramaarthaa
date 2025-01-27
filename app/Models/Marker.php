<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    protected $table = 'markers'; // Explicitly define table name
    protected $fillable = ['name', 'latitude', 'longitude'];
}
