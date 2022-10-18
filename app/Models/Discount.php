<?php

namespace App\Models;

use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'discount_value',
        'value_per_day',
        'date',
        'notes',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staff_id' , 'id');
    }
}
