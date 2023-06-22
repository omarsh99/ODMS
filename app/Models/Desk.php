<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desk extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'symbol', 'position_x', 'position_y', 'height', 'width', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
