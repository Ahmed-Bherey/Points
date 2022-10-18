<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'days',
        'holidy_id',
        'date',
        'notes',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staff_id' , 'id');
    }
}
