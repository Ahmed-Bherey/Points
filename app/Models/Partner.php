<?php

namespace App\Models;

use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Partner extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'amount',
        'treasury_id',
        'type',
        'tel',
        'rate',
        'notes',
    ];

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }
}
