<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Treasury;
use App\Models\SalesReturn;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesNoBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'date',
        'delegate_id',
        'last_balance',
        'invoice_num',
        'item_id',
        'unit_id',
        'store_id',
        'quantity',
        'unit_price',
        'code',
        'discount_value',
        'discount_rate',
        'total_price',
        'added_tax_value',
        'added_tax_rate',
        'treasury_id',
        'bank_id',
        'total_returned',
        'paid',
        'rest',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function treasury(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }

    public function banks(){
        return $this->belongsTo(Bank::class , 'bank_id' , 'id');
    }

    public function representatives(){
        return $this->belongsTo(Representative::class , 'delegate_id' , 'id');
    }

    public function customers(){
        return $this->belongsTo(SalesReturn::class , 'customer_id' , 'id');
    }
}
