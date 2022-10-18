<?php

namespace App\Models;

use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'work_day_num',
        'main_holiday',
        'sub_holiday',
        'attendance_time',
        'leaving_time',
        'attendance_leaving_duration',
        'normal_holiday_num',
        'casual_holiday_num',
        'work_hours',
        'absence_day',
        'delay_hour',
        'extra_hour',
        'basedOnNumOfMonthDay',
        'cost_type',
        'extra_fixed_amount',
        'basedOnFixedAmount',
        'delay_fixed_amount',
        'cost_time',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staff_id' , 'id');
    }
}
