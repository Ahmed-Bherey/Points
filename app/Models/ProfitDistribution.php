<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProfitDistribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'net_profit',
        'draw_date',
        'treasury_id',
        'bank_id',
        'dateTo',
        'distributed_profit',
        'amount',
        'notes',
    ];

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
