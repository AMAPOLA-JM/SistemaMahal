<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";
    protected $primaryKey = 'id_category';
    protected $fillable = ['name_category', 'description_category', 'state_category'];

    public function items(){
        return $this->hasMany('App\Models\Item', 'id_category');
    }
}
