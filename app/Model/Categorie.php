<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categorie';

    public function paniers(){

        return $this->hasOne('App\Model\Produit');
    }
}
