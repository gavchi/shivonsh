@extends('secret')
@section('content')
<h2>Argus was found</h2>

<div class="form">
{{ Form::open(array('action' => 'AdminController@anyLogin')) }}
{{ Form::text('login', '', array('placeholder' => 'name'));}}
{{ Form::password('password', '');}}
{{ Form::submit('SEND', array('class' => 'submit'));}}
{{ Form::close() }}
</div>
@stop