<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $fillable = ["name", "is_active"];

    const LIMIT_PAGINATOR = 10;
    //@todo add relationship with manga
}
