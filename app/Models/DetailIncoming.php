<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailIncoming extends Model
{
    use HasFactory;

    protected $table = "details_incoming";
    protected $primaryKey = 'id_details_incoming';
    protected $fillable = ['id_item', 'id_incoming', 'numbers_details_incoming', 'total_price_details_incoming'];

    public function incoming(){
        return $this->belongsTo('App\Models\Incoming', 'id_incoming');
    }

    public function item(){
        return $this->belongsTo('App\Models\Item', 'id_item');
    }
}
