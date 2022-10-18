<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'working_days',
        'main_holiday',
        'sub_holiday',
        'attendance_time',
        'leaveing_time',
        'attendance_leaving_duration',
        'work_hours',
        'absence_day',
        'delay_hour',
        'extra_hour',
        'basedOnNumOfMonthDay',
        'cost_type',
        'basedOnFixedAmount',
    ];
}
