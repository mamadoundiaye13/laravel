<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User_panier extends Model
{
    protected $table = 'user_panier';

    public function produits(){

        return $this->hasMany('App\Model\Produit');
    }

    public function catalogue(){

        return $this->hasOne('App\Model\Produit');
    }
}
