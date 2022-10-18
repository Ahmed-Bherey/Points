<?php

namespace App\Models;

use App\Models\Engineer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryTo extends Model
{
    use HasFactory;
    protected $fillable = ['engineer_id','date'];

    public function engineers(){
        return $this->belongsTo(Engineer::class , 'engineer_id' , 'id');
    }
}
