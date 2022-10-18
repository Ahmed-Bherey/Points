<?php

namespace App\Models;

use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Totaldamge extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'store_id',
        'note',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
