<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			<h1>Developer's Best Friend</h1>
		@stop
		@section('content')
		<div class="well">
			<h2 class= "text-success">Lorem Ipsum Generator</h2>
			<blockquote>Lorem Ipsum is random latin dummy text used by publishers and graphic designers that has the flow
				of words, sentences, and paragraphs in English and other latin based languages.<br><br>
				Lorem Ipsum is used by publishers and graphic designers for review where they do not want the
				reviewers to get hung up on the text, rather focusing on the design.
			</blockquote>
			
			<a href='/lorem-ipsum' class="btn btn-warning">Generate some text...</a>
		</div>
		<div class="well">
			<h2 class="text-danger">Random User Generator</h2>
			<blockquote>The Random User Generator does as its name implies, it generators fields of random user data such
				as name, address, email, phone number, web URL, etc... These Random field generators can be used to help
				decide on cool usernames, baby names, passwords, etc... They can also be used to generate data to test with
				applications that need form data such as that produced by this generator.
			</blockquote>
			<a href='/random-user' class="btn btn-info">Generate Random Users...</a>
		</div>
		<div class="well">
			<h2 class="text-warning">xkcd Password Generator</h2>
			<blockquote>An xkcd Password Generator is a type of password generator that attempts to create memorable passwords for humans that are also difficult for
				computers to guess. The basic argument behind the strength of the password is that a longer password will have more entropy than a shorter password
				independent of the characters use as a computer does not care if the password contains actual words or not.
			</blockquote>
			<a href='/xkcd-passwd-gen' class="btn btn-success">Generate xkcd Passwords...</a>
		</div>
		@stop
	</body>
</html>