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
    				Select the permissions you require below. The tool will provide you with an octal code that corresponds to these permissions which can then be applied to relevant directories and files with  <code>chmod</code>.
				</div>
			</div>    				
    <form id="perms" action="" method="post">
        
        <div class="row">
			<div class="col-lg-3">
				<div class="bs-component">
					<div class="panel panel-success">
	                	<div class="panel-heading">
							<h3 class="panel-title">Special</h3>
						</div>
						<div class="panel-body">
							<div><label for="suid"><input type="checkbox" name="suid" value="4000" id="suid">setuid</label><a href="/info/#setuid" class="help"><span class="acchide">What is setuid?</span></a></div>
							<div><label for="sgid"><input type="checkbox" name="sgid" value="2000" id="sgid">setgid</label><a href="/info/#setgid"  class="help"><span class="acchide">What is setgid?</span></a></div>
							<div><label for="sticky_bit"><input type="checkbox" name="sticky_bit" value="1000" id="sticky_bit">Sticky bit</label><a href="/info/#sticky-bit" class="help"><span class="acchide">What is Sticky bit?</span></a></div>
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
							<label for="user_read"><input type="checkbox" name="user_read" value="0400" id="user_read">Read</label></br>
				            <label for="user_write"><input type="checkbox" name="user_write" value="0200" id="user_write">Write</label></br>
				            <label for="user_execute"><input type="checkbox" name="user_execute" value="0100" id="user_execute">Execute</label></br>
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
							<label for="group_read"><input type="checkbox" name="group_read" value="0040" id="group_read">Read</label></br>
							<label for="group_write"><input type="checkbox" name="group_write" value="0020" id="group_write">Write</label></br>
							<label for="group_execute"><input type="checkbox" name="group_execute" value="0010" id="group_execute">Execute</label></br>
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
							<label for="other_read"><input type="checkbox" name="other_read" value="0004" id="other_read">Read</label></br>
							<label for="other_write"><input type="checkbox" name="other_write" value="0002" id="other_write">Write</label></br>
							<label for="other_execute"><input type="checkbox" name="other_execute" value="0001" id="other_execute">Execute</label></br>
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
	            <input id="submit" type="submit" value="Submit">
	        </div>
	    </div>

    </form>
		@stop

	</body>
</html>