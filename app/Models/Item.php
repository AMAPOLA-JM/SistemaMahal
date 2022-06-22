<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = "items";

    protected $fillable = ['id_category', 'id_brand', 'name_item', 'size_item', 'unit_price_item', 'wholesale_price_item', 'description_item'];

    public function detailsincomings(){
        return $this->hasMany('App\Models\DetailIncoming', 'id_item');
    }

    public function notedetails(){
        return $this->hasMany('App\Models\NoteDetail', 'id_item');
    }

    public function brand(){
        return  $this->belongsTo('App\Models\Brand', 'id_brand');
    }

    public function category(){
        return  $this->belongsTo('App\Models\Category', 'id_category');
    }
}
