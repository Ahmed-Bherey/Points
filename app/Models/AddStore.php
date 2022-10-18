<?php

namespace App\Models;

use App\Models\User;
use App\Models\StStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddStore extends Model
{
    use HasFactory;
    protected $fillable = ['user_id' , 'st_store_id'];

    public function stores(){
        return $this->belongsTo(StStore::class , 'st_store_id' , 'id');
    }

    public function users(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
