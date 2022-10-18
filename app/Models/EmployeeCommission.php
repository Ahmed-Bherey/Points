<?php

namespace App\Models;

use App\Models\IteItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeeCommission extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_id',
        'commission',
    ];

    public function items(){
        return $this->belongsTo(IteItem::class , 'item_id' , 'id');
    }
}
