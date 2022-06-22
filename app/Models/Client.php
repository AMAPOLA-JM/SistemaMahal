<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = "clients";

    protected $fillable = ['dni_client', 'name_client', 'surname_client', 'tel_client', 'buys_client'];

    public function notesales(){
        return $this->hasMany('App\Models\NoteSale', 'id_client');
    }
}
