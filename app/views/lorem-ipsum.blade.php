<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			{{ link_to('/', 'Back to the Main Page', array('class'=> 'btn btn-info')) }}
			<h2>Lorem-ipsum Paragraph Generator</h2>
		@stop
		@section('content')
			<div class="form-group">
				{{ Form::open(array('url' => 'lorem-ipsum','method' =>'post')) }}
				{{ Form::label('numpars', 'Number of Paragraphs')}}
				{{ Form::text('numpars') }}				
				{{ Form::submit("Generate Text", array("class"=>"btn btn-default"))}}
				{{ Form::close() }}

			</div>

			<!-- Show error messages under the input text box if present -->
			@if ($errors->has())
			<div class="col-lg-4 text-center">
				<div class="alert alert-dismissable alert-danger">
					@foreach ($errors->all() as $error)
						<strong>{{ $error }}</strong>
					@endforeach
				</div>
			</div>
			@endif
			
			<!-- If $numpars is set and there are no error messages, generate paragraphs -->
			@if(isset($numpars))
			<?php
				$generator = new Badcow\LoremIpsum\Generator();
				$paragraphs = $generator->getParagraphs($numpars);
				echo implode('<p>', $paragraphs);
			?>
		</p>
			@endif
		@stop

	</body>
</html>