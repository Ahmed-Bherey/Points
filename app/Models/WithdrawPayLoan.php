<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use App\Models\BorrowerData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WithdrawPayLoan extends Model
{
    use HasFactory;
    protected $fillable = [
        'borrowData_id',
        'date',
        'treasury_id',
        'bank_id',
        'paidFrom',
        'paidTo',
        'rest',
        'notes',
    ];

    public function borrowsData(){
        return $this->belongsTo(BorrowerData::class ,'borrowData_id','id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class ,'treasury_id','id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class ,'bank_id','id');
    }
}
