<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.css'); }}
			{{ HTML::style('//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css'); }}
			{{ HTML::script('//code.jquery.com/jquery-1.10.2.js'); }}
			{{ HTML::script('//code.jquery.com/ui/1.11.1/jquery-ui.js'); }}
			{{ HTML::script('js/jquery.timers.js'); }}
			{{ HTML::script('js/mbTooltip.js'); }}
			{{ link_to('/', 'Back to the Main Page') }}
    		<meta charset="utf-8">
    		<title>xkcd Password Generator</title>
    		<meta name="viewport" content="width=device-width, initial-scale=1">

			<div class="page-header" id="banner">
		        <div class="row">
		          <div class="col-lg-8 col-md-7 col-sm-6">
		            <h1>xkcd Password Generator</h1>
		            <p class="lead">Implementation by Mike Vartanian</p>
		          </div>
		          <div class="col-lg-4 col-md-5 col-sm-6">
		          </div>
		        </div>
		    </div>


		@stop
		@section('content')

		<!-- Web App Description Section
	      ================================================== -->
	      <div class="bs-docs-section">
	        <!-- Headings -->

	        <div class="row">
	            <div class="col-lg-14">
	              <div class="well">
	                <h2>What is an xkcd Password Generator?</h2>
	                  <p class="text-info">   An xkcd Password Generator is a type of password generator that attempts to create memorable passwords for humans that are also difficult for
	                                            computers to guess. The basic argument behind the strength of the password is that a longer password will have more entropy than a shorter password
	                                            independent of the characters use as a computer does not care if the password contains actual words or not.</p>
	              </div>
	              <div class="well">              
	                <h2>Web App Description</h2>
	                  <p class="text-warning">  This web application implements the xkcd password generation function as described by various websites using PHP as the backend language
	                                            and HTML/CSS for the front end language for the form input/parameters and display of generated passwords. There is also some javascript and
	                                            jQuery added in for some visual effects.</p>
	                  <h3>Bootstrap</h3>
	                    <p class="text-danger"> A simple, single flat page was employed using the following free bootstrap template called Bootswatch designed by Thomas Park with the source URL located here
	                                            <a href="http://bootswatch.com/slate/">Slate Bootswatch Theme</a>. The free theme looked contemporary and the form inputs were very appealing
	                                            for this assignment.</p>
	                  <h3>Form Inputs</h3>
	                    <p class="text-success"> I went back and forth between dropdowns and text boxes in order to make error checking easier. Dropdowns already provide some sort of inherit error
	                                            checking as the user can only choose between available options. There are two error checking mechanisms in the code. Both use the POST error checking method.
	                                            The first was for the radio button if it is not checked. This only works the first time as values are saved after submitting the form once. The second error
	                                            checking was done with the word length. If the Min word length is greater than the Max word length, the code sets the max value to min value + 1. Therefore,
	                                            the minimum value options have to be one less than Max.</p>

	                  <h3>Wordlist</h3>
	                    <p class="text-primary"> Initially I started with a large wordlist with 100k words that had many variants of words such as contractions and possesives.
	                                            This took processing time to load and required manual adjustment such as removing the apostrophes to simplify the code and fix errors.
	                                            Therefore, I found a Google wordlist with 10k words which was more manageable to work with. The source URL for the Google wordlist is located here
	                                            <a href="https://github.com/first20hours/google-10000-english">Google 10k Wordlist</a>.</p>
	              </div>
	          </div>
	        </div>
	      </div>      

		<div class="bs-docs-section">
			<div class="row">
				<div class="col-lg-12">
					<div class="page-header">
						<h1 id="forms" title="what the hell is this?">Let's Generate Some Passwords!!</h1>
					</div>
				</div>
			</div>
		</div>	


		<div class="row">
			<div class="col-lg-6">
				<div class="well-password">
					{{ Form::open(array('url' => 'xkcd-passwd-gen', 'method' =>'post', 'class' => 'form-horizontal')) }}
              <!--<form name="myform" method="post" class="form-horizontal" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return saveScrollPositions(this);">
                <input type="hidden" name="scrollx" id="scrollx" value="0" />
                <input type="hidden" name="scrolly" id="scrolly" value="0" />
-->
					<fieldset>
					<legend>Password Parameters</legend>
						<div class="form-group">
							{{ Form::label('select1', 'Number of Words', array('class' => 'col-lg-4 control-label',
																				'title' => 'Number of Words that will be included in the Passphrase') )}}
							<div class="col-lg-3">
								{{ Form::select('NumWords', array(
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
									'7'		=> '7',
									'8'		=> '8',
									'9'		=> '9',
									'10'	=> '10'
									), null, 
									array('class' => 'form-control',
										  'id' => 'select1')) }}
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('Word', 'Word Length', array('class' => 'col-lg-4 control-label',
																		'title' => 'The minimum and maximum of word lengths used in passphrase. Note that there is some simple error checking that will force Max=Min+1 if not set appropriately.'))}}
							<div class="col-lg-3">
								{{ Form::select('WordLengthMin', array(
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
									'7'		=> '7',
									'8'		=> '8',
									'9'		=> '9'
									), null,
									array('class' => 'my-form-control',
										  'id' => 'WordMin')) }}
								<label for="WordMin" class="col-lg-offset-4">Min</label>
							</div>
							<div class="col-lg-3 col-lg-offset-2">
								{{ Form::select('WordLengthMax', array(
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
									'7'		=> '7',
									'8'		=> '8',
									'9'		=> '9',
									'10'	=> '10'
									), null,
									array('class' => 'my-form-control')) }}
								<label for="WordLengthMax" class="col-lg-offset-4">Max</label>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('select3','Number of Numbers', array('class' => 'col-lg-4 control-label',
																				'title' => 'Number of Numbers to add at the beginning and end of the entire passphrase.'))}}
							<div class="col-lg-3">
								{{ Form::select('NumNums', array(
									'0'		=> '0',
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
									'7'		=> '7',
									'8'		=> '8',
									'9'		=> '9',
									'10'	=> '10'
									), null,
									array('class' => 'form-control')) }}
							</div>
						</div>
						<p class="text-right my-p">Separator&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
						<div class="form-group">
							{{ Form::label('NumC','# of Special Chars', array(	'class' => 'col-lg-4 control-label',
																				'title' => 'The number of special characters to add at the end of each word in passphrase.'))}}
							<div class="col-lg-3">
								{{ Form::select('NumChars', array(
									'0'		=> '0',
									'1'		=> '1',
									'2'		=> '2',
									'3'		=> '3',
									'4'		=> '4',
									'5'		=> '5',
									'6'		=> '6',
									'7'		=> '7',
									'8'		=> '8',
									'9'		=> '9',
									'10'	=> '10'
									), null,
									array('class' => 'form-control')) }}
							</div>
							<div class="col-lg-3 col-lg-offset-2">
								{{ Form::select('NumChars', array(
									'-'			=> '-',
									'&nbsp;'	=> '&nbsp;',
									'_'			=> '_'
									), null,
									array('class' => 'my-form-control')) }}
							</div>
						</div>
						<div class="form-group">
                          	{{Form::label('label', 'Capitalization Options', array(	'class' => 'col-lg-10 control-label',
                          															'title' => 'Choose between all uppercase, all lowercase, or just capitalizing the first letter of each word') )}}
							<div class="col-lg-10">
				 				{{ Form::radio('CapWords', 'UpperCase') }} All Uppercase
				 				{{ Form::radio('CapWords', 'FirstLetterCap') }} Only First Letter Uppercase
				 				{{ Form::radio('CapWords', 'LowerCase') }} All Lowercase
				 			</div>
				 		</div>
				 	</fieldset>
				 	<fieldset id="submit-field">
                  		<div class="form-group">
                    		<div class="col-lg-12">
								{{ Form::submit("Submit", array('class'=>'btn btn-primary btn-block'))}}
								{{ Form::close() }}
							</div>
						</div>
					</fieldset>
				</div>
		</div>

		<div class="col-lg-6">
			<div class="well-password">
				<fieldset id="outputs">
					<legend>Password Outputs<legend>
					<br>
				<div class="form-group">
					{{ Form::label(null,'Password 1', array( 'class' => 'control-label text-warning'))}}
                  <input type="text"  class="form-control" id="inputDefault" value ="<?php if ( isset( $_POST['submit'] ) ) {
                                                    print_r(generate_password($NumWords,$Separator,$NumNums,$WordLengthMin,$WordLengthMax,$CapWords,$NumChars));} ?>">
                </div>

				<div class="form-group">
                  {{ Form::label(null,'Password 2', array( 'class' => 'control-label text-info'))}}
                  <input type="text" class="form-control" id="inputDefault" value ="<?php if ( isset( $_POST['submit'] ) ) {
                                                    print_r(generate_password($NumWords,$Separator,$NumNums,$WordLengthMin,$WordLengthMax,$CapWords,$NumChars));} ?>">
				</div>

				<div class="form-group">
                  {{ Form::label(null,'Password 3', array( 'class' => 'control-label text-danger'))}}
                  <input type="text" class="form-control" id="inputDefault" value ="<?php if ( isset( $_POST['submit'] ) ) {
                                                    print_r(generate_password($NumWords,$Separator,$NumNums,$WordLengthMin,$WordLengthMax,$CapWords,$NumChars));} ?>">
				</div>

				<div class="form-group">
                  {{ Form::label(null,'Password 4', array( 'class' => 'control-label text-success'))}}
                  <input type="text" class="form-control" id="inputDefault" value ="<?php if ( isset( $_POST['submit'] ) ) {
                                                    print_r(generate_password($NumWords,$Separator,$NumNums,$WordLengthMin,$WordLengthMax,$CapWords,$NumChars));} ?>">
				</div>
				</fieldset>
			</div>
		</div>

		@stop
		@section('footer')
			<div class="row">
				<div class="col-lg-16">
					<ul class="list-inline center-block">
						<li><a href="https://www.facebook.com/mike.vartanian"><img src="http://mikevartanian.me/CSCI-E-15-Assets/images/facebook.png" height="50" width="50" alt="facebook"></a></li>
						<li><a href="https://twitter.com/mvartani76"><img src="http://mikevartanian.me/CSCI-E-15-Assets/images/twitter.png" height="50" width="50" alt="twitter"></a></li>
						<li><a href="https://plus.google.com/+MikeVartanian/posts"><img src="http://mikevartanian.me/CSCI-E-15-Assets/images/google-plus.png" height="50" width="50" alt="google+"></a></li>
						<li><a href="http://www.pinterest.com/mikevartanian/"><img src="http://mikevartanian.me/CSCI-E-15-Assets/images/pinterest.png" height="50" width="50" alt="pinterest"></a></li>
						<li><a href="https://www.linkedin.com/pub/michael-vartanian/3/906/549/"><img src="http://mikevartanian.me/CSCI-E-15-Assets/images/linkedin.png" height="50" width="50" alt="linkedin"></a></li>
					</ul>
				</div>
			</div>
		@stop
	</body>
</html>