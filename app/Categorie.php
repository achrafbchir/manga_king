<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $fillable = ["name", "is_active"];

    //@todo add relationship with manga
}
