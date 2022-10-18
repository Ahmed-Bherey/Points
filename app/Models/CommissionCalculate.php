<?php

namespace App\Models;

use App\Models\IteItem;
use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommissionCalculate extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'employee_id',
        'commission',
        'date',
        'quantity',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }

    public function employes(){
        return $this->belongsTo(StaffData::class , 'employee_id' , 'id');
    }
}
