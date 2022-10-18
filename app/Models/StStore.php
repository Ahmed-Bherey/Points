<?php

namespace App\Models;

use App\Models\AddStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StStore extends Model
{
    use HasFactory;
    protected $table = 'st_stores';

    protected $fillable = [
        'code', 'name','stMan_name',
        'phone', 'notes','address',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at' ,'updated_at'
    ];

    public function addstores(){
        return $this->hasMany(AddStore::class , 'st_store_id' , 'id');
    }

    public function items(){
        return $this->hasMany(IteItem::class , 'store_id' , 'id');
    }
}
