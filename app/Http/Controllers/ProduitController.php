<?php

namespace App\Http\Controllers;

use App\Model\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    public function view($id){

        $produits = Produit::where('id', $id)->firstOrFail();
       return view('catalogue.post', compact('produits'));
    }


    public function index()
    {
        $produits = new Produit();

        $all_produits = $produits::all();

        return view('catalogue.catalogue', compact('all_produits'));

        /* la fonction compact équivaut à array('posts' => $posts) */
    }


    public function ajouterProduit()
    {
        return view('admin');

        /* la fonction compact équivaut à array('posts' => $posts) */
    }

    public function create()
    {
        return view('admin');
    }

    public function store()
    {
        $produit = new Produit();

        $produit->titre = request('title');
        $produit->description = request('desc');
        $produit->prix=request('prix');
        $produit->stock_restant=request('stock');
        $produit->photo=request('picture');

        $produit->save();

        return view('produit.ajouter');
    }

    public function update(){

        $id_produit = request('id');
        $stock_restant = request('stock_restant');

        $prdt = new Produit();
        $all_produits = $prdt->all();

        foreach ($all_produits as $produit){
            if ($produit->id == $id_produit){

                DB::update("update produit SET stock_restant = $stock_restant where id = '$id_produit'");
                return view('produit.update');
            }

            else
            {
                return view('produit.pas_produit');
            }
        }


    }


    public function delete(){
        $id = request('id_produit_delete');


        $prdt = new Produit();
        $all_produits = $prdt->all();

        foreach ($all_produits as $produit){
            if ($produit->id == $id){
                Produit::destroy($id);
                return redirect()->action('ProduitController@index');
            }

            else
            {
                return view('produit.pas_produit');
            }
        }
    }
}
