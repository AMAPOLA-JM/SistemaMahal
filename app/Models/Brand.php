<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = "brands";

    protected $fillable = ['id_supplier', 'name_brand', 'status_brand'];

    public function items(){
        return $this->hasMany('App\Models\Item', 'id_brand');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier', 'id_supplier');
    }
}
