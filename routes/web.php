<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------- 
|
*/

Route::get('/{param}', function() {
    return view('welcome');
  })->where('param', '.+');