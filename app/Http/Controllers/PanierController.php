<?php

namespace App\Http\Controllers;

use App\Model\Panier;
use App\Model\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PanierController extends Controller
{
    public function view($id)
    {

        $user_id = Auth::user()->id;

        $produit = DB::select("select * from produit where id = '$id'");

        foreach ($produit as $prdt)
        {
            if ($prdt->stock_restant == 0)
            {
                return view('produit.pas_stock');
            }
        }


        $panier = new Panier();

        $panier->quantite = 1;
        $panier->produit_id = $id;
        $panier->user_id = $user_id;
        $panier->titre = $produit[0]->titre;
        $panier->photo = $produit[0]->photo;
        $panier->prix = $produit[0]->prix;
        $panier->save();


        return $this->index();

    }

    public static function compteProduitsPaniers()
    {
        $pnr = new Panier();
        $paniers = $pnr->all();

        $user_id = Auth::user()->id;

        $total_panier = 0;

        foreach ($paniers as $panier) {
            if ($user_id == $panier->user_id){
                $total_panier = $total_panier+$panier->quantite;
            }
        }
        return $total_panier;
    }

    public static function totalCommande()
    {

        $pnr = new Panier();
        $paniers = $pnr->all();

        $user_id = Auth::user()->id;

        $total_panier = 0;

        foreach ($paniers as $panier) {
            if ($user_id == $panier->user_id){
                $total_panier = $total_panier+$panier->prix;
            }
        }
        return $total_panier;
    }



    public function index()
    {
        $paniers = new Panier();

        $all_paniers = $paniers::all();

        return view('panier.panier', compact('all_paniers'));

        /* la fonction compact équivaut à array('posts' => $posts) */
    }



    public function delete($id){
        Panier::destroy($id);
        return redirect()->action('PanierController@index');
    }

    public function create()
    {
        return view('admin');
    }

    public function store()
    {
        $produit_id = (integer)request('id');

        $new_stock_restant = request('stock_restant');

        $produit = new Produit();

        $all_produits = $produit->all();

        foreach ($all_produits as $produit) {

            if ($new_stock_restant==0 or $produit->stock_restant == 0){
                return "Stock epuisé !";
            }

            else if ($produit->id == $produit_id and $produit->stock_restant != 0)
            {
                DB::update("update produit SET stock_restant = $new_stock_restant where id = '$produit_id'");

                return view('catalogue.catalogue', compact('all_produits'));

            }

        }
        return "ID non retrouvé";

    }


}
