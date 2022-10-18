<?php

namespace App\Models;

use App\Models\Type;
use App\Models\IteSize;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\IteColor;
use App\Models\AddCompany;
use App\Models\LinlItemStore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class IteItem extends Model
{
    use HasFactory;
    protected $table = 'ite_items';
    protected $fillable = [
        'name',
        'global_code',
        'local_code',
        'unit_id',
        'company_id',
        'type_id',
        'size_id',
        'color_id',
        'sale_price',
        'max_discount',
        'wholesale_price',
        'max_sell',
        'half_wholesale',
        'min_qty',
        'pur_price',
        'max_qty',
    ];

    public function companies() {
        return $this->belongsTo(AddCompany::class , 'company_id' , 'id');
    }

    public function types() {
        return $this->belongsTo(Type::class , 'type_id' , 'id');
    }

    public function sizes() {
        return $this->belongsTo(IteSize::class , 'size_id' , 'id');
    }

    public function colors() {
        return $this->belongsTo(IteColor::class , 'color_id' , 'id');
    }

    public function unites() {
        return $this->belongsTo(IteUnit::class , 'unit_id' , 'id');
    }

    public function items(){
        return $this->hasMany(LinlItemStore::class , 'item_id' , 'id');
    }
}
