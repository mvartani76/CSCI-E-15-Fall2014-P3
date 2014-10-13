<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// landing page
Route::get('/', function()
{
	return View::make('index');
});

// Generate view when URI is /lorem-ipsum
Route::get('/lorem-ipsum', function(){
	return View::make('lorem-ipsum');
});

// Generate a view when receiving post msg with 'numpars' variable
// and then go back to the /lorem-ipsum view with 'numpars' set to
// generate some lorem-ipsum text paragraphs
Route::post('/lorem-ipsum', function(){
	$numpars = Input::get('numpars');
    return View::make('lorem-ipsum')
        	->with('numpars', $numpars);
});

?>