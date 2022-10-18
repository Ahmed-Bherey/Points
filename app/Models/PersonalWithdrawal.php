<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalWithdrawal extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'process',
        'amount',
        'treasury_id',
        'bank_id',
        'notes',
    ];

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
