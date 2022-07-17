<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteDetail extends Model
{
    use HasFactory;

    protected $table = "note_details";
    protected $primaryKey = 'id_note_detail';
    protected $fillable = ['id_note_sale', 'id_item', 'quantity_note_detail', 'total_price_note_detail'];

    public function item(){
        return  $this->belongsTo('App\Models\Item', 'id_item');
    }

    public function notesale(){
        return  $this->belongsTo('App\Models\NoteSale', 'id_note_sale');
    }
}
