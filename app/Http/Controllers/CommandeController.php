<?php

namespace App\Http\Controllers;

use App\Model\Commande;
use App\Model\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{
    public static function totalCommande()
    {
        $paniers = DB::select("select * from panier");

        $user_id = Auth::user()->id;

        $total_panier = 0;

        foreach ($paniers as $panier) {
            if ($user_id == $panier->user_id){
                $total_panier = $total_panier+$panier->prix;
            }
        }
        return $total_panier;
    }

    public function view($id)
    {

        $user_id = Auth::user()->id;


        $commande = new Commande();
        $commande->user_id = $user_id;
        $commande->panier_id = $id;
        $commande->prix = self::totalCommande();
        $commande->save();

        $all_paniers = DB::select("select * from panier where user_id = $user_id");


        foreach ($all_paniers as $panier){
            if ($panier->user_id == $user_id){
                Panier::destroy($panier->id);
                $all_produits = DB::select("select * from produit where id = '$panier->produit_id'");

                foreach ($all_produits as $produit){
                    DB::update('update produit set stock_restant = (stock_restant-1) where id = ?', [$produit->id]);
                }

            }
    }


        return view('commande.commande');

    }

    public function index()
    {
        $paniers = new Panier();

        $all_paniers = $paniers::all();

        return view('panier.panier', compact('all_paniers'));

        /* la fonction compact équivaut à array('posts' => $posts) */
    }
}
