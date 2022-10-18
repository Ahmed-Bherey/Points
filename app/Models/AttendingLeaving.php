<?php

namespace App\Models;

use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttendingLeaving extends Model
{
    use HasFactory;
    protected $fillable = [
        'staffData_id',
        'type',
        'date',
        'attendance_time',
        'notes',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staffData_id' , 'id');
    }
}
