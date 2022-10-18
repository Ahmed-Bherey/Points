<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TotalAddPermission extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'store_id',
        'notes',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
