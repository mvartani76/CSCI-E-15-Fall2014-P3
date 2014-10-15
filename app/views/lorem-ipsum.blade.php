<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			{{ link_to('/', 'Back to the Main Page') }}
			<h2>This is my lorem-ipsum page</h2>
		@stop
		@section('content')
			<div class="form-group">
				{{ Form::open(array('url' => 'lorem-ipsum','method' =>'post')) }}
				{{ Form::label('numpars', 'Number of Paragraphs')}}
				{{ Form::text('numpars') }}
				{{ Form::submit("Generate Text", array("class"=>"btn btn-default"))}}
				{{ Form::close() }}
			</div>
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