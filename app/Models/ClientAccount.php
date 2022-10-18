<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientAccount extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'tel',
        'receipt_num',
        'invoice_num',
        'representative_id',
        'date',
        'bank_id',
        'treasury_id',
        'paid_to',
        'paid_from',
        'rest',
        'notes',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function representatives(){
        return $this->belongsTo(Representative::class , 'representative_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
