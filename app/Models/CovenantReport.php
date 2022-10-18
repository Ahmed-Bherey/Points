<?php

namespace App\Models;

use App\Models\CovenantData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CovenantReport extends Model
{
    use HasFactory;
    protected $fillable = [
        'covenant_id',
        'custodian',
        'dateFrom',
        'dateTo',
    ];

    public function covenants(){
        return $this->belongsTo(CovenantData::class , 'covenant_id' , 'id');
    }
}
