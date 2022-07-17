<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = "suppliers";
    protected $primaryKey = 'id_supplier';
    protected $fillable = ['name_supplier', 'seller_supplier', 'city_supplier', 'contact_supplier', 'status_supplier'];

    public function incomings(){
        return $this->hasMany('App\Models\Incoming', 'id_supplier');
    }

    public function brands(){
        return $this->hasMany('App\Models\Brand', 'id_supplier');
    }
}
