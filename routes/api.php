<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes Dashboard
|--------------------------------------------------------------------------
*/
// Route::post('auth', 'Auth\AuthApiController@authenticate');

// Route::group(['middleware' => 'jwt.auth'], function() {
    
    Route::resource('dashboard/bairros', 'Api\Location\DistrictApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/cidades', 'Api\Location\CityApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/estados', 'Api\Location\StateApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/regioes', 'Api\Location\RegionApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/paises', 'Api\Location\CountryApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/clientes', 'Api\User\CustomerApiController')->only('index', 'store', 'update', 'destroy');
    Route::resource('dashboard/administradores', 'Api\User\AdministratorApiController')->only('index', 'store', 'update', 'destroy');

// }); 



// Route::prefix('v1')->namespace('Api\Auth')->group(function () {
//     // Login
//      Route::post('/login', 'AuthApiController@postLogin');
     
     
     
//     // Protected with APIToken Middleware
//      Route::middleware('APIToken')->group(function () {
//       // Logout
//        Route::post('/logout', 'AuthController@postLogout');

       
//     });
// });






// Route::middleware('APIToken')->group(function () {
//     Route::post('/login', 'Api\Auth\AuthApiController@postLogin');
//     // Logout
//      Route::post('/logout', 'AuthController@postLogout');

//      Route::resource('dashboard/clientes', 'Api\User\CustomerApiController')->only('index', 'store', 'update', 'destroy');
// Route::resource('dashboard/administradores', 'Api\User\AdministratorApiController')->only('index', 'store', 'update', 'destroy');
//   });

