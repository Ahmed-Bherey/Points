<?php

namespace App\Models;

use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TreasuryTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'treasuryFrom_id',
        'treasuryTo_id',
        'value',
        'notes',
    ];

    public function treasuryFrom(){
        return $this->belongsTo(Treasury::class , 'treasuryFrom_id' , 'id');
    }

    public function treasuryTo(){
        return $this->belongsTo(Treasury::class , 'treasuryTo_id' , 'id');
    }
}
