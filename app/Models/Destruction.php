<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destruction extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'assets_amount',
        'destructions_amount',
        'date',
        'pure_asset',
        'destruction_amount',
    ];
}
