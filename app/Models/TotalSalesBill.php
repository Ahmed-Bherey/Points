<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Client;
use App\Models\StStore;
use App\Models\Treasury;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TotalSalesBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'client_id',
        'representative_id',
        'bill_num',
        'store_id',
        'payment_getway',
        'treasury_id',
        'bank_id',
        'notes',
        'total_before_discount',
        'discount_value',
        'total_after_discount',
        'added_tax_value',
        'total',
        'paid',
        'rest',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function representatives(){
        return $this->belongsTo(Representative::class , 'representative_id' , 'id');
    }

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }
}
