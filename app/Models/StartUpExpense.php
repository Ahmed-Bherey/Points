<?php

namespace App\Models;

use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StartUpExpense extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'name',
        'amount',
        'treasury_id',
        'notes',
    ];

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }
}
