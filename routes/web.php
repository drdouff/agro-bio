<?php

use Illuminate\Support\Facades\Route;

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
/* Route clients */
Route::get('/', 'ClientController@home');
Route::get('/shop', 'ClientController@shop');
Route::get('/pagne', 'ClientController@pagne');
Route::get('/client_login', 'ClientController@client_login');
Route::get('/inscription', 'ClientController@inscription');
Route::get('/checkout', 'ClientController@checkout');


/* Route Admin */
Route::get('/admin', 'AdminController@dashboard');
Route::get('/commandes', 'AdminController@commandes');

/* Route categories */
Route::get('/addcategories', 'CategoriesController@addcategories');
Route::post('/sauvercategorie', 'CategoriesController@sauvercategorie');
Route::get('/categories', 'CategoriesController@categories');
Route::get('/edit_categorie/{id}', 'CategoriesController@edit_categorie');
Route::post('/modifiercategorie', 'CategoriesController@modifiercategorie');
Route::get('/supprimercategorie/{id}', 'CategoriesController@supprimercategorie');

/* Route produits */
Route::get('/addproduit', 'ProduitsController@addproduit');
Route::Post('/sauverproduit', 'ProduitsController@sauverproduit');
Route::get('/produits', 'ProduitsController@produits');
Route::get('/edit_produit/{id}', 'ProduitsController@edit_produit');
Route::post('/modifierproduit', 'ProduitsController@modifierproduit');
Route::get('/suprimerproduit/{id}', 'ProduitsController@suprimerproduit');
Route::get('/active_produit/{id}', 'ProduitsController@active_produit');
Route::get('/desactiver_produit/{id}', 'ProduitsController@desactiver_produit');

/* Route sliders */
Route::get('/addslider', 'SliderController@addslider');
Route::Post('/sauverslider', 'SliderController@sauverslider');
Route::get('/slider', 'SliderController@slider');
Route::get('/edit_slider/{id}', 'SliderController@edit_slider');
Route::post('/modifierslider', 'SliderController@modifierslider');
Route::get('/suprimerslider/{id}', 'SliderController@suprimerslider');
Route::get('/active_slider/{id}', 'SliderController@active_slider');
Route::get('/desactiver_slider/{id}', 'SliderController@desactiver_slider');
