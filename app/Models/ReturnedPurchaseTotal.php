<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\StStore;
use App\Models\Supplier;
use App\Models\Treasury;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReturnedPurchaseTotal extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'invoice_num',
        'store_id',
        'payment_getway',
        'bank_id',
        'treasury_id',
        'total_before_discount',
        'discount_valuee',
        'total_after_discount',
        'tax_added_value_rate',
        'supplier_id',
        'supplier_balance',
        'delegate_id',
        'notes',
        'total',
        'paid',
        'rest',
        'purchase_status',
    ];

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }

    public function Treasury(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }

    public function representatives(){
        return $this->belongsTo(Representative::class , 'delegate_id' , 'id');
    }
}
