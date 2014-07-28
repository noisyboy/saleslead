@if (Session::has('message'))
	<div class="{{ Session::get('class') }}">{{ Session::get('message') }}</div>
@endif