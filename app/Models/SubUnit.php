<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\IteUnit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubUnit extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'unit_id',
        'sub_unit',
        'quantity',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function units(){
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }
}
