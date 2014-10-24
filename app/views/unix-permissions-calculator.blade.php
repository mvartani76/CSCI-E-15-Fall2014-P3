<html>
	<body>
		@extends('master')
		@section('header')
			{{ HTML::style('css/bootstrap.min.css'); }}
			{{ link_to('/', 'Back to the Main Page', array('class'=> 'btn btn-info')) }}
			<h2>Unix Permissions Calculator</h2>
		@stop
		@section('content')
    		<div class="row">
    			<div class="well">
    				<h3>This simple web application allows the user to generate an octal code to set unix permissions which can be applied to relevant directories
    				and files using the unix command, chmod. The application started from the inspiration webiste,
    				{{ link_to('http://permissions-calculator.org/', 'http://permissions-calculator.org/'); }},
    				and was then modified using laravel/blade templating and bootstrap themes.</h3>
				</div>
			</div>    				
    		{{ Form::open(array('url' => 'unix-permissions-calculator','method' =>'post')) }}
        
	        <div class="row">
				<div class="col-lg-3">
					<div class="bs-component">
						<div class="panel panel-success">
		                	<div class="panel-heading">
								<h3 class="panel-title">Special</h3>
							</div>
							<div class="panel-body">
								{{ Form::checkbox('suid', '4000') }}{{Form::label('suid','setuid')}}</br>
								{{ Form::checkbox('sgid', '2000') }}{{Form::label('sgid','setgid')}}</br>
								{{ Form::checkbox('sticky_bit', '1000') }}{{Form::label('sticky_bit','Sticky Bit')}}</br>
		    	            </div>
	            	  	</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="bs-component">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">User</h3>
							</div>
							<div class="panel-body">
								{{ Form::checkbox('user_read', '0400') }}{{Form::label('user_read','Read')}}</br>
								{{ Form::checkbox('user_write', '0200') }}{{Form::label('user_write','Write')}}</br>
								{{ Form::checkbox('user_execute', '0100') }}{{Form::label('user_execute','Execute')}}</br>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="bs-component">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h3 class="panel-title">Group</h3>
							</div>
							<div class="panel-body">
								{{ Form::checkbox('group_read', '0400') }}{{Form::label('group_read','Read')}}</br>
								{{ Form::checkbox('group_write', '0200') }}{{Form::label('group_write','Write')}}</br>
								{{ Form::checkbox('group_execute', '0100') }}{{Form::label('group_execute','Execute')}}</br>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="bs-component">
						<div class="panel panel-warning">
							<div class="panel-heading">
								<h3 class="panel-title">Other</h3>
							</div>
							<div class="panel-body">
								{{ Form::checkbox('other_read', '0400') }}{{Form::label('other_read','Read')}}</br>
								{{ Form::checkbox('other_write', '0200') }}{{Form::label('other_write','Write')}}</br>
								{{ Form::checkbox('other_execute', '0100') }}{{Form::label('other_execute','Execute')}}</br>
							</div>
						</div>
					</div>
				</div>
	        </div>
	        
	        <div class="well">
	        	<div id="results">
					<h2>Absolute Notation (octal)</h2>
					<p id="octal">0000</p>
					<p class="example">e.g: chmod <span id="octal_example">0000</span> &lt;path-to-file&gt;</p>
				</div>
				<div>
					{{ Form::submit('Submit', array('class'=>'btn btn-danger btn-block'))}}
					{{ Form::close() }}
				</div>
			</div>
		@stop
	</body>
</html>