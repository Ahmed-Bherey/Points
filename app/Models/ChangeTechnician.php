<?php

namespace App\Models;

use App\Models\Technician;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChangeTechnician extends Model
{
    use HasFactory;
    protected $fillable = [
        'technicianFrom_id',
        'technicianTo_id',
    ];

    public function technicianFrom(){
        return $this->belongsTo(Technician::class , 'technicianFrom_id' , 'id');
    }

    public function technicianTo(){
        return $this->belongsTo(Technician::class , 'technicianTo_id' , 'id');
    }
}
