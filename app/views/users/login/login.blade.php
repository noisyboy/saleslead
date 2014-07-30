@section('content')



{{ Form::open(array('url' => 'login', 'class' => 'form-signin', 'role' => 'form')) }}
	@include('shared.notification')
  	<h2 class="form-signin-heading">Please sign in</h2>
  		{{ Form::text('email_or_username', null, array('class'=>'form-control', 'autofocus' => '','required'=> '', 'placeholder'=>'Email address / Username')) }}
   		{{ Form::password('password', array('class'=>'form-control','autofocus' => '','required'=> '', 'placeholder'=>'Password')) }}	
  	<div class="checkbox">
  		<label>
  			{{ Form::checkbox('remember', 1) }} Remember me
  		</label>
  	</div>
  	{{ Form::submit('Login', array('class'=>'btn btn-lg btn-primary btn-block'))}}
{{ Form::close() }}
@stop
