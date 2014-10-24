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
	$routelib = new RouteLib();

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
	$routelib = new RouteLib();

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
	$routelib = new RouteLib();

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

// Generate view when URI is /unix-permissions-calculator
Route::get('/unix-permissions-calculator', function(){
	return View::make('unix-permissions-calculator');
});

Route::post('/unix-permissions-calculator', function(){

	$suid = Input::get('suid');
	$sgid = Input::get('sgid');
	$sticky_bit = Input::get('sticky_bit');
	$user_read = Input::get('user_read');
	$user_write = Input::get('user_write');
	$user_execute = Input::get('user_execute');
	$group_read = Input::get('group_read');
	$group_write = Input::get('group_write');
	$group_execute = Input::get('group_execute');
	$other_read = Input::get('other_read');
	$other_write = Input::get('other_write');
	$other_execute = Input::get('other_execute');

	// check to see if the variables are set...
	// if they are not set, set them to 0000
	// non set variables affect the bitwise OR function below
	if(!isset($suid))
		$suid = '0000';
	if(!isset($sgid))
		$sgid = '0000';
	if(!isset($sticky_bit))
		$sticky_bit = '0000';
	if(!isset($user_read))
		$user_read = '0000';
	if(!isset($user_write))
		$user_write = '0000';
	if(!isset($user_execute))
		$user_execute = '0000';
	if(!isset($group_read))
		$group_read = '0000';
	if(!isset($group_write))
		$group_write = '0000';
	if(!isset($group_execute))
		$group_execute = '0000';
	if(!isset($other_read))
		$other_read = '0000';
	if(!isset($other_write))
		$other_write = '0000';
	if(!isset($other_execute))
		$other_execute = '0000';	

	// perform a bitwise or to all the fields to generate the octal
	// code. note that this will not generate the leading 0 so if
	// the MSBs are not set, we will need to manually add the 0s in
	$octal_output = $suid | $sgid | $sticky_bit
				| $user_read | $user_write | $user_execute
				| $group_read | $group_write | $group_execute
				| $other_read | $other_write | $other_execute;

	echo (string)$octal_output;
	echo "....";
	$octal_strlength = strlen((string)$octal_output);
	echo $octal_strlength;

	// append leading zeros as needed
	if ($octal_strlength == 1)
		$octal_output = '000' . (string)$octal_output;
	elseif ($octal_strlength == 2)
		$octal_output = '00' . (string)$octal_output;
	elseif ($octal_strlength == 3)
		$octal_output = '0' . (string)$octal_output;

	return View::make('unix-permissions-calculator')
			->with('octal_output', $octal_output);
});	

?>