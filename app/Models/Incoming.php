<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    use HasFactory;

    protected $table = "incomings";
    protected $primaryKey = 'id_incoming';
    protected $fillable = ['id_user', 'id_supplier', 'date_incoming', 'total_price_incoming'];

    public function detailsincomings(){
        return $this->hasMany('App\Models\DetailIncoming', 'id_incoming');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier', 'id_supplier');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
