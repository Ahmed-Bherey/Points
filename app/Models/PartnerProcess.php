<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PartnerProcess extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'process',
        'treasure_id',
        'bank_id',
        'date',
        'amount',
        'notes',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasure_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
