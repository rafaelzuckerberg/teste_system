<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes Dashboard
|--------------------------------------------------------------------------
*/ 

Route::group(['prefix' => 'v1'], function() {

    Route::post('login', 'Auth\AuthApiController@login');  
    Route::post('refresh', 'Auth\AuthApiController@refrshToken');
    Route::get('logout', 'Auth\AuthApiController@logout');  


    Route::group(['middleware' => 'jwt.auth'], function() {
        Route::resource('dashboard/bairros', 'Api\Location\DistrictApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/cidades', 'Api\Location\CityApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/estados', 'Api\Location\StateApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/regioes', 'Api\Location\RegionApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/paises', 'Api\Location\CountryApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/clientes', 'Api\User\CustomerApiController')->only('index', 'store', 'update', 'destroy');
        Route::resource('dashboard/administradores', 'Api\User\AdministratorApiController')->only('index', 'store', 'update', 'destroy');
    }); 
}); 






