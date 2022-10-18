<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\StStore;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Serial extends Model
{
    use HasFactory;
    protected $fillable = [
        'invoice_number',
        'invoice_date',
        'supplier_id',
        'item_id',
        'quantity',
        'store_id',
        'serial',
    ];

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function stores(){
        return $this->belongsTo(StStore::class , 'store_id' , 'id');
    }
}
