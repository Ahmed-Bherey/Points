<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PayInstallment extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'client_id',
        'invoice_num',
        'invoice_date',
        'treasury_id',
        'bank_id',
        'total_of_all_installment',
        'rest',
        'monthly_total',
        'notes',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
