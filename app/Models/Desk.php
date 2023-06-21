<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    protected $fillable = ['name', 'symbol', 'position_x', 'position_y', 'height', 'width'];
    use HasFactory;
}
