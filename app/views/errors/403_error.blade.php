@extends('layouts.default')

@section('content')
<div class="row">
		
		<div class="span12">
			
			<div class="error-container">
				<h1>403</h1>
				
				<h2>Sorry, Permission denied.</h2>
				
				<div class="error-details">
					Sorry, you dont have the permission for this request! Why not try going back to the <a href="/">home page</a> or perhaps try following!
					
				</div> <!-- /error-details -->
				
				<div class="error-actions">
					<a href="/dashboard" class="btn btn-large btn-primary">
						<i class="icon-chevron-left"></i>
						&nbsp;
						Back to Dashboard						
					</a>
					
					
					
				</div> <!-- /error-actions -->
							
			</div> <!-- /error-container -->			
			
		</div> <!-- /span12 -->
		
	</div> <!-- /row -->
@stop