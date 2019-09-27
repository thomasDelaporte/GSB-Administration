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


Route::get('/', ['middleware' =>'guest', function(){
    return view('auth.login');
}]);

Auth::routes(['register' => false]);

Route::group(['middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index')->name('home');

    Route::prefix('visiteur')->group(function(){

        Route::get('', 'VisiteurController@list')->name('visiteur.list');

        Route::get('create', 'VisiteurController@create')->name('visiteur.create');
        Route::post('store', 'VisiteurController@store')->name('visiteur.store');

        Route::get('edit/{id}/', 'VisiteurController@edit')->name('visiteur.edit');
        Route::patch('update/{id}', 'VisiteurController@update')->name('visiteur.update');

        Route::delete('destroy/{id}', 'VisiteurController@destroy')->name('visiteur.destroy');
    });


    Route::prefix('praticien')->group(function(){
        
        Route::get('', 'PraticienController@list')->name('praticien.list');

        Route::get('create', 'PraticienController@create')->name('praticien.create');
        Route::post('store', 'PraticienController@store')->name('praticien.store');

        Route::get('edit/{id}/', 'PraticienController@edit')->name('praticien.edit');
        Route::patch('update/{id}', 'PraticienController@update')->name('praticien.update');

        Route::delete('destroy/{id}', 'PraticienController@destroy')->name('praticien.destroy');
    });


    Route::prefix('delegue')->group(function(){

        Route::get('', 'DelegueController@list')->name('delegue.list');

        Route::get('create', 'DelegueController@create')->name('delegue.create');
        Route::post('store', 'DelegueController@store')->name('delegue.store');

        Route::get('edit/{id}', 'DelegueController@edit')->name('delegue.edit');
        Route::patch('update/{id}', 'DelegueController@update')->name('delegue.update');

        Route::delete('destroy/{id}', 'DelegueController@destroy')->name('delegue.destroy');
    });


    Route::prefix('produit')->group(function(){

        Route::get('', 'ProduitController@list')->name('produit.list');

        Route::get('create', 'ProduitController@create')->name('produit.create');
        Route::post('create', 'ProduitController@store')->name('produit.store');

        Route::post('composant/{id}', 'ProduitController@storeComposant')->name('produit.composant');
        Route::delete('composant/{idProduit}-{idComposant}', 'ProduitController@composantDestroy')->name('produit.composant.destroy');

        Route::post('indication/{id}', 'ProduitController@storeIndication')->name('produit.indication');
        Route::delete('indication/{idProduit}-{idIndication}', 'ProduitController@indicationDestroy')->name('produit.indication.destroy');

        Route::get('edit/{id}', 'ProduitController@edit')->name('produit.edit');
        Route::patch('update/{id}', 'ProduitController@update')->name('produit.update');

        Route::delete('destroy/{id}', 'ProduitController@destroy')->name('produit.destroy');
    });


    Route::prefix('composant')->group(function(){

        Route::get('', 'ComposantController@list')->name('composant.list');

        Route::post('store', 'ComposantController@store')->name('composant.store');

        Route::get('edit/{id}', 'ComposantController@edit')->name('composant.edit');
        Route::patch('update/{id}', 'ComposantController@update')->name('composant.update');

        Route::delete('destroy/{id}', 'ComposantController@destroy')->name('composant.destroy');
    });


    Route::prefix('indication')->group(function(){

        Route::get('', 'IndicationController@list')->name('indication.list');

        Route::post('store', 'IndicationController@store')->name('indication.store');

        Route::get('edit/{id}', 'IndicationController@edit')->name('indication.edit');
        Route::patch('update/{id}', 'IndicationController@update')->name('indication.update');

        Route::delete('destroy/{id}', 'IndicationController@destroy')->name('indication.destroy');
    });


    Route::prefix('region')->group(function(){

        Route::get('', 'RegionController@list')->name('region.list');

        Route::post('store', 'RegionController@store')->name('region.store');

        Route::get('edit/{id}', 'RegionController@edit')->name('region.edit');
        Route::patch('update/{id}', 'RegionController@update')->name('region.update');

        Route::delete('destroy/{id}', 'RegionController@destroy')->name('region.destroy');
    });


    Route::prefix('visite')->group(function(){

        Route::get('', 'VisiteController@list')->name('visite.list');
        Route::get('item/{id}', 'VisiteController@item')->name('visite.item');

        Route::get('create', 'VisiteController@create')->name('visite.create');
        Route::post('store', 'VisiteController@store')->name('visite.store');

        Route::get('edit/{id}/', 'VisiteController@edit')->name('visite.edit');
        Route::patch('update/{id}', 'VisiteController@update')->name('visite.update');

        Route::delete('destroy/{id}', 'VisiteController@destroy')->name('visite.destroy');
    });

    Route::prefix('activite')->group(function(){

        Route::get('', 'ActiviteController@list')->name('activite.list');
        Route::get('item/{id}', 'ActiviteController@item')->name('activite.item');

        Route::post('praticien/{id}', 'ActiviteController@praticien')->name('activite.praticien');

        Route::get('create', 'ActiviteController@create')->name('activite.create');
        Route::post('store', 'ActiviteController@store')->name('activite.store');

        Route::get('edit/{id}/', 'ActiviteController@edit')->name('activite.edit');
        Route::patch('update/{id}', 'ActiviteController@update')->name('activite.update');

        Route::delete('destroy/{id}', 'ActiviteController@destroy')->name('activite.destroy');
    });
});