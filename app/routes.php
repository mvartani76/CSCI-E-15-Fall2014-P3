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

// Generate view when URI is /random-user
Route::get('/random-user', function(){
	return View::make('random-user');
});

// Generate a view when receiving post msg with 'numpars' variable
// and then go back to the /lorem-ipsum view with 'numpars' set to
// generate some lorem-ipsum text paragraphs
Route::post('/random-user', function(){
	$numusers = Input::get('numusers');
	$address = Input::get('address');
	$phonenum = Input::get('phonenum');
	$incemail = Input::get('incemail');
	$companyname = Input::get('companyname');
	$birthdate = Input::get('birthdate');
    return View::make('random-user')
        	->with('numusers', $numusers)
        	->with('address', $address)
        	->with('phonenum', $phonenum)
        	->with('incemail', $incemail)
        	->with('companyname', $companyname)
        	->with('birthdate', $birthdate);
});

// Generate view when URI is /random-user
Route::get('/xkcd-passwd-gen', function(){
	return View::make('xkcd-passwd-gen');
});

?>