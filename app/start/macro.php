<?php

Form::macro('errorMsg', function($field, $errors){
    if($errors->has($field)){
        $msg = $errors->first($field);
        return "<span class=\"error\">$msg</span>";
    }
    return '';
});