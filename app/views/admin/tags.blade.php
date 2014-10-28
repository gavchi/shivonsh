@extends('secret')
@section('content')
<h3>Add new</h3>
<div class="form">
{{ Form::open(array('action' => 'AdminController@anyTags')) }}
{{ Form::text('name', '', array('placeholder' => 'New tag'));}}
{{ Form::submit('SEND', array('class' => 'submit'));}}
{{ Form::close() }}
</div>

<h2>Current tags</h2>
<ul>
@foreach($Tags as $Tag)
<li>{{$Tag->name}} <a href="/secret/deltag?id={{$Tag->id}}"> X </a></li>
@endforeach
</ul>
@stop