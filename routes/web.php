<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');



Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::get('/AddProduits', 'ProduitController@create');
    Route::post('/AddProduits', 'ProduitController@store');


    Route::get('/DeleteProduits', 'ProduitController@delete');
    Route::post('/DeleteProduits', 'ProduitController@delete');

    Route::post('/UPDATEStock', 'ProduitController@update');
    Route::get('/UPDATEStock', 'ProduitController@update');

});

Route::prefix('produits')->group(function () {

    Route::get('/', 'ProduitController@index');
    Route::get('/ajouter_un_autre', 'ProduitController@ajouterProduit');
    Route::post('/{id}', 'ProduitController@view')->name('profile');
    Route::get('/{id}', 'ProduitController@view')->name('profile');

});

Route::prefix('paniers')->group(function () {

    Route::get('/', 'PanierController@index');
    Route::get('/{id}', 'PanierController@view')->name('paniersForm');
    Route::get('direct/{id}', 'PanierController@view')->name('panier_des');

    Route::post('/', 'PanierController@index')->name('delete');
    Route::post('/{id}', 'PanierController@view')->name('paniersForm');
    Route::post('direct/{id}', 'PanierController@view')->name('panier_des');

    Route::post('delete/{id}', 'PanierController@delete')->name('delete_panier');
});


Route::prefix('commande')->group(function () {
    Route::post('/panier/{id}', 'CommandeController@view')->name('commande');
    Route::get('/panier /{id}', 'CommandeController@view');

});






