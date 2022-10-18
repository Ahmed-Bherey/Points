<?php

namespace App\Models;

use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Engineer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'store_id',
        'tel',
        'rate',
        'notes',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
