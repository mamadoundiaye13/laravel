<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    protected $table = 'catalogue';

    public function produits(){

        return $this->hasMany('App\Model\Produit');
    }
}
