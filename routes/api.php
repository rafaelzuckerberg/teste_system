<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::resource('dashboard/clientes', 'Api\User\CustomerApiController')->only('index', 'store', 'update', 'destroy');
Route::resource('dashboard/administradores', 'Api\User\AdministratorApiController')->only('index', 'store', 'update', 'destroy');
