<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			<h2>Index Page - Maybe?</h2>
		@stop
		@section('content')

		<a href='/lorem-ipsum'>Generate some text...</a>

		@stop
	</body>
</html>