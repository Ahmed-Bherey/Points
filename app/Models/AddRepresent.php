<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddRepresent extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'representative_id'];

    public function representatives(){
        return $this->belongsTo(Representative::class , 'representative_id' , 'id');
    }
}
