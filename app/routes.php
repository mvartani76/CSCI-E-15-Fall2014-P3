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
	$data = Input::all();

	// Setup the rules array
	$rules = array(
			'numpars' => 'Required|Integer|Min:1');

	// Setup the messages array
	$messages = array(
				'required' => 'This field is required to generate text',
				'integer' => 'Input must be an integer',
				'min' => 'Input must be greater than or equal to 1');

	// create a new validator instance
	$validator = Validator::make($data, $rules, $messages);

	if ($validator->passes()){
    	return View::make('lorem-ipsum')
        		->with('numpars', $numpars);
    }
    	return Redirect::to('lorem-ipsum')->withErrors($validator);
});

// Generate view when URI is /random-user
Route::get('/random-user', function(){
	return View::make('random-user');
});

// Generate a view when receiving post msg with the various variables
// and then go back to the /random-user view with variables set to
// generate some random-user details...
Route::post('/random-user', function(){
	$numusers = Input::get('numusers');
	$address = Input::get('address');
	$phonenum = Input::get('phonenum');
	$incemail = Input::get('incemail');
	$companyname = Input::get('companyname');
	$birthdate = Input::get('birthdate');

	// might be a little redundancy here since the variables
	// are loaded above as well...
	$data = Input::all();

	// Setup the rules array
	$rules = array(
			'numusers' => 'Required|Integer|Min:1');

	// Setup the messages array
	$messages = array(
				'required' => 'This field is required to generate users',
				'integer' => 'Input must be an integer',
				'min' => 'Input must be greater than or equal to 1');

	// create a new validator instance
	$validator = Validator::make($data, $rules, $messages);

	if ($validator->passes()){
	    return View::make('random-user')
	        	->with('numusers', $numusers)
	        	->with('address', $address)
	        	->with('phonenum', $phonenum)
	        	->with('incemail', $incemail)
	        	->with('companyname', $companyname)
	        	->with('birthdate', $birthdate);
	        }

		return Redirect::to('random-user')->withErrors($validator);
});

// Generate view when URI is /random-user
Route::get('/xkcd-passwd-gen', function(){
	return View::make('xkcd-passwd-gen');
});

Route::post('xkcd-passwd-gen', function(){
	
	$NumWords = Input::get('NumWords');
	$WordLengthMin = Input::get('WordLengthMin');
	$WordLengthMax = Input::get('WordLengthMax');
	$NumNums = Input::get('NumNums');
	$NumChars = Input::get('NumChars');
	$Separator = Input::get('Separator');
	$CapWords = Input::get('CapWords');

    return View::make('xkcd-passwd-gen')
        	->with('NumWords', $NumWords)
        	->with('WordLengthMin', $WordLengthMin)
        	->with('WordLengthMax', $WordLengthMax)
        	->with('NumNums', $NumNums)
        	->with('NumChars', $NumChars)
        	->with('Separator', $Separator)
        	->with('CapWords', $CapWords);
});

?>