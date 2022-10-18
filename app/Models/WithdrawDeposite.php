<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawDeposite extends Model
{
    use HasFactory;
    protected $fillable = [
        'bank_id',
        'process',
        'amount',
        'date',
        'treasury_id',
        'notes',
    ];

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }
}
