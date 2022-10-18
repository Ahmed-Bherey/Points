<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupplierOrders extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_number',
        'suppler_id',
        'date',
        'item_id',
        'unit_price',
        'quantity',
    ];

    public function supplies(){
        return $this->belongsTo(Supplier::class , 'suppler_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'suppler_id' , 'id');
    }
}
