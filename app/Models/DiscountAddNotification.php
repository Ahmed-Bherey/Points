<?php

namespace App\Models;

use App\Models\Supplier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscountAddNotification extends Model
{
    use HasFactory;
    protected $fillable = [
        'discountAddNotification_type',
        'supplier_id',
        'date',
        'amount',
        'last_balance',
        'notes',
    ];

    public function suppliers(){
        return $this->belongsTo(Supplier::class , 'supplier_id' , 'id');
    }
}
