<?php

namespace App\Models;

use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'main',
        'loan',
        'absent',
        'absent_value',
        'insurance',
        'hours',
        'hours_value',
        'delay',
        'delay_value',
        'net_salary',
        'meal',
        'transition',
        'reward',
        'discount',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staff_id' , 'id');
    }
}
