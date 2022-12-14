<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'address',
        'tel',
        'email',
        'notes',
        'balance',
        'user_id',
    ];

    public function users(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
