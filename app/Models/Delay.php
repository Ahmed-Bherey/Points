<?php

namespace App\Models;

use App\Models\StaffData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delay extends Model
{
    use HasFactory;
    protected $fillable = [
        'staff_id',
        'hours',
        'mints',
        'date',
        'notes',
    ];

    public function staffs(){
        return $this->belongsTo(StaffData::class , 'staff_id' , 'id');
    }
}
