<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesReturn extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_num',
        'name',
        'delegate',
        'date',
        'last_balance',
        'total_before_discount',
        'discount_rate1',
        'discoun_value1',
        'added_tax_value',
        'total_after_discount',
        'item_id',
        'unit_id',
        'store_id',
        'quantity',
        'unit_price',
        'code',
        'discoun_value2',
        'total_price',
        'discount_rate2',
        'added_tax_rate',
        'total_returned',
        'paid',
        'treasury_id',
        'bank_id',
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
}
