<?php

namespace App\Http\Controllers;


use App\Model\Produit;
use http\Env\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $produits = new Produit();

        $all_produits=$produits::all();

        return view('catalogue.catalogue', compact('all_produits'));
        /* la fonction compact équivaut à array('posts' => $posts) */
    }


}
