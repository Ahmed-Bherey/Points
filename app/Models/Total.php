<?php

namespace App\Models;

use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Total extends Model
{
    use HasFactory;
    protected $fillable = [
        'store_id',
        'date',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
