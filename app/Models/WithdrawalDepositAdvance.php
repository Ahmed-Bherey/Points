<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use App\Models\BorrowerData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawalDepositAdvance extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrowerData_id',
        'date',
        'amount',
        'treasury_id',
        'bank_id',
        'borrower_order',
        'process_type',
        'rest',
        'notes',
    ];

    public function borrowersData(){
        return $this->belongsTo(BorrowerData::class , 'borrowerData_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
