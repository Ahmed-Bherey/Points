<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Supplier;
use App\Models\Treasury;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BounceNoBill extends Model
{
    use HasFactory;
    protected $fillable = [
        'supplier_id',
        'date',
        'last_balance',
        'receipt_num',
        'item_id',
        'unit_id',
        'store_id',
        'quantity',
        'unit_price',
        'discount_value',
        'discount_rate',
        'total_item_price',
        'tax_added_value',
        'tax_added_rate',
        'total_return',
        'paid',
        'rest',
        'treasury_id',
    ];

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }

    public function treasuries(){
        return $this->belongsTo(Treasury::class , 'treasury_id' , 'id');
    }
}
