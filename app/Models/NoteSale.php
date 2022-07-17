<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteSale extends Model
{
    use HasFactory;

    protected $table = "note_sales";
    protected $primaryKey = 'id_note_sale';
    protected $fillable = ['id_client', 'id_user', 'date_note', 'state_note', 'total_import_note'];

    public function notedetails(){
        return $this->hasMany('App\Models\NoteDetail', 'id_note_sale');
    }

    public function client(){
        return $this->belongsTo('App\Models\Client', 'id_client');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'id_user');
    }
}
