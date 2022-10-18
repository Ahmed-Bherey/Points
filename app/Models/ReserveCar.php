<?php

namespace App\Models;

use App\Models\Client;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Representative;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReserveCar extends Model
{
    use HasFactory;
    protected $fillable = [
        'statement_num',
        'permission_type',
        'client_id',
        'storeFrom_id',
        'storeTo_id',
        'representative_id',
        'date',
        'target',
        'from',
        'notes',
        'final_balance',
        'previous_balance',
        'total_before_discount',
        'discount_value1',
        'discount_rate1',
        'sales_tax',
        'transportation_cost',
        'total_after_discount',
        'profit',
        'code',
        'quantity',
        'unit_price',
        'quantity_discount',
        'addition_rate',
        'item_id',
        'unit_id',
        'discount_value2',
        'discount_rate2',
        'current_balance',
        'total_item_price',
    ];

    public function clients(){
        return $this->belongsTo(Client::class , 'client_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }

    public function storesFrom(){
        return $this->belongsTo(StStore::class , 'storeFrom_id' , 'id');
    }

    public function storesTo(){
        return $this->belongsTo(StStore::class , 'storeTo_id' , 'id');
    }

    public function representatives(){
        return $this->belongsTo(Representative::class , 'representative_id' , 'id');
    }
}
