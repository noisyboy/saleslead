@if ($errors->any())
<div class="alert alert-danger " >
	@if(Session::has('message'))
        <p class="error">{{ Session::get('message') }}</p>
    @endif
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif