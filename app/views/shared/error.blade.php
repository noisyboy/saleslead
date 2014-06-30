@if ($errors->any())
<div class="col-md-offset-2 alert alert-danger " >
    <ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>
</div>
@endif