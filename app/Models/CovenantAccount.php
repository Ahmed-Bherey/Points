<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use App\Models\CovenantData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CovenantAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'covenant_id',
        'date',
        'amount',
        'treasury_id',
        'bank_id',
        'custodian',
        'process',
        'rest',
        'notes',
    ];

    public function covenants(){
        return $this->belongsTo(CovenantData::class , 'covenant_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
