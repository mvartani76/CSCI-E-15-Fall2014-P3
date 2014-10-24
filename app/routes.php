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
	
	// Create a new Routelib instance
	$routelib = new Routelib();

	$numpars = Input::get('numpars');
	$data = Input::all();

	// Setup the rules array
	$routelib->setrules(array(
			'numpars' => 'Required|Integer|Min:1'));
	$rules = $routelib->getRules();

	// Setup the messages array
	$routelib->setMessages(array(
				'required' => 'This field is required to generate text',
				'integer' => 'Input must be an integer',
				'min' => 'Input must be greater than or equal to 1'));

	$messages = $routelib->getMessages();

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
	
	// Create a new Routelib instance
	$routelib = new Routelib();

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
	$routelib->setrules(array(
			'numusers' => 'Required|Integer|Min:1'));

	$rules = $routelib->getRules();

	// Setup the messages array
	$routelib->setmessages(array(
				'required' => 'This field is required to generate users',
				'integer' => 'Input must be an integer',
				'min' => 'Input must be greater than or equal to 1'));

	$messages = $routelib->getMessages();

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

// Generate view when URI is /xkcd-passwd-gen
Route::get('/xkcd-passwd-gen', function(){
	return View::make('xkcd-passwd-gen');
});

Route::post('/xkcd-passwd-gen', function(){
	
	// Create a new Routelib instance
	$routelib = new Routelib();

	$NumWords = Input::get('NumWords');
	$WordLengthMin = Input::get('WordLengthMin');
	$WordLengthMax = Input::get('WordLengthMax');
	$NumNums = Input::get('NumNums');
	$NumChars = Input::get('NumChars');
	$Separator = Input::get('Separator');
	$CapWords = Input::get('CapWords');

	// might be a little redundancy here since the variables
	// are loaded above as well...
	$data = Input::all();

	$diff = $WordLengthMax - $WordLengthMin;

	$data = array_add($data,'diff', $diff);

	// Setup the rules array
	// I noticed a very interesting problem -- The validation would always show that
	// it passed if I only had one rule, Mine:x. If I added the Integer rule to it,
	// the validation correctly showed errors when diff was less than or equal to x
	// and passed if diff was greater than x... Very interesting.. Didn't see any documentation
	// that would suggest that there needed to be at least two rules and messages?
	$routelib->setrules(array(
			'diff' => 'Integer|Min:0'));

	$rules = $routelib->getRules();

	// Setup the messages array
	$routelib->setmessages(array(
				'integer' => 'Difference must be an Integer',
				'min' => 'Max Word Length must be greater than or equal to Min Word Length'));

	$messages = $routelib->getMessages();

	// create a new validator instance
	$validator = Validator::make($data, $rules, $messages);

	if ($validator->passes()){
	    return View::make('xkcd-passwd-gen')
	        	->with('NumWords', $NumWords)
	        	->with('WordLengthMin', $WordLengthMin)
	        	->with('WordLengthMax', $WordLengthMax)
	        	->with('NumNums', $NumNums)
	        	->with('NumChars', $NumChars)
	        	->with('Separator', $Separator)
	        	->with('CapWords', $CapWords);
	        }
		return Redirect::to('xkcd-passwd-gen')->withErrors($validator);
});

?>