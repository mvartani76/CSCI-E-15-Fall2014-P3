<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			{{ link_to('/', 'Back to the Main Page') }}
			<h2>Random User Generator</h2>
		@stop
		@section('content')
			<div class="form-group">
				{{ Form::open(array('url' => 'random-user','method' =>'post')) }}
				{{ Form::label('numusers', 'Number of Users', array('class' => 'form2'))}}
				<div style="float:left">
					<!-- Wanted to use the following syntax but couldn't get the correct formatting (ie size) {{ Form::text('numusers') }} -->
					<input type="text" name="numusers" size="5">
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::label('address', 'Include Address?', array('class' => 'form2'))}}
				<div style="float:left">
					{{ Form::Radio('address','Yes')}}Yes
					{{ Form::Radio('address','No')}}No
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::label('phonenum', 'Include Phone Number?', array('class' => 'form2'))}}
				<div style="float:left">
					{{ Form::Radio('phonenum','Yes')}}Yes
					{{ Form::Radio('phonenum','No')}}No
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::label('incemail', 'Include Email Address?', array('class' => 'form2'))}}
				<div style="float:left">
					{{ Form::Radio('incemail','Yes')}}Yes
					{{ Form::Radio('incemail','No')}}No
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::label('companyname', 'Include Company Name?', array('class' => 'form2'))}}
				<div style="float:left">
					{{ Form::Radio('companyname','Yes')}}Yes
					{{ Form::Radio('companyname','No')}}No
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::label('birthdate', 'Include Birthdate?', array('class' => 'form2'))}}
				<div style="float:left">
					{{ Form::Radio('birthdate','Yes')}}Yes
					{{ Form::Radio('birthdate','No')}}No
				</div>
				</br>
			</div>
			<div class="form-group">
				{{ Form::submit("Generate Users", array("class"=>"btn btn-warning"))}}
				{{ Form::close() }}
			</div>
			@if(isset($numusers))
			<?php
				// use the factory to create a Faker\Generator instance
				$faker = Faker\Factory::create();

				// generate a loop that outputs properties "$numuser" times
				for ($i=0;$i<$numusers;$i++){
					// generate data by accessing properties
					echo "<div class = \"well\">";
					echo "<h4>";
					echo "<div class = \"text-danger\">", "Name: ", $faker->name, "</div>";
					echo "</h4>";
					echo "<table>";
					//echo nl2br(" \r\n");
					if ($address == "Yes"){
						echo "<div class = \"form2\">", "Address: ", "</div>", "<div style=\"float:left\">", $faker->streetAddress, "</div>";
						echo nl2br(" \r\n");
						echo "<div style=\"float:left;width:1400;margin-left:300\">", $faker->city;
						echo ", ", $faker->state, " ", $faker->postcode, "</div>";
						echo nl2br(" \r\n");
					}
					echo "</table>";
					if ($phonenum == "Yes"){
						echo "<div class = \"form2\">", "Phone Number: ", "</div>", $faker->phoneNumber;
						echo nl2br(" \r\n");
					}
					if ($incemail == "Yes"){
						echo "<div class = \"form2\">", "Email: ", "</div>", $faker->email;
						echo nl2br(" \r\n");
					}
					if ($companyname == "Yes"){
						echo "<div class = \"form2\">", "Company Name: ", "</div>", $faker->company;
						echo nl2br(" \r\n");
					}
					if ($birthdate == "Yes"){
						echo "<div class = \"form2\">", "Birthdate: ", "</div>", $faker->date($format='Y-m-d', $max='now');
						echo nl2br(" \r\n");
					}
					// Add an additional line break if multiple fields are chosen to make more readable
					//if (($address == "Yes") or ($phonenum == "Yes") or ($incemail == "Yes") or ($companyname == "Yes")
					//	or ($birthdate == "Yes"))
					//	echo nl2br(" \r\n");
					echo "</div>";
				}

			?>
			@endif
		</p>
			
		@stop

	</body>
</html>