@extends('secret')
@section('content')
<h3>Add new</h3>
<div class="form">
{{ Form::open(array('action' => 'AdminController@anyTags')) }}
{{ Form::file('file', '', array('placeholder' => 'New tag'));}}
@foreach($Tags as $Tag)
{{Form::checkbox($Tag->id, $Tag->name)}}
@endforeach
{{ Form::submit('SEND', array('class' => 'submit'));}}
{{ Form::close() }}
</div>

<div class="gallery">
    @foreach($Gallery as $Image)
        <a class="artwork" rel="gallery" href="/i/full/{{$Image->file}}"><img src="/i/{{$Image->file}}"></a>
    @endforeach
</div>
@stop