<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produit';



    public function users(){

        return $this->hasMany('App\Model\User');
    }

    public function categories(){

        return $this->hasOne('App\Model\Categorie');
    }

    public function paniers(){

        return $this->hasMany('App\Model\Produit_panier');
    }

    public function catelogues(){

        return $this->hasOne('App\Model\Catalogue');
    }
}
