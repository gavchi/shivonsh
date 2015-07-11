@extends('secret')
@section('content')
<h3>Add new</h3>
<div class="form">
{{ Form::open(array('action' => 'AdminController@postArtCreate', 'files'=> true)) }}
{{ Form::file('file', '', array('placeholder' => 'New art'));}}
@foreach($Tags as $Tag)
<label>{{Form::checkbox('tag[]', $Tag->id)}}{{$Tag->name}}</label>
@endforeach
{{ Form::submit('SEND', array('class' => 'submit'));}}
{{ Form::close() }}
</div>
@stop
@section('gallery')
<div class="gallery">
    @foreach($Gallery as $Image)
        <div class="artwork">
            <a class="art" rel="gallery" href="/i/full/{{$Image->file}}"><img src="/i/{{$Image->file}}"></a>
            <a class="delete" href="/secret/delart?id={{$Image->id}}"> X </a>
        </div>
    @endforeach
    {{$Gallery->links()}}
</div>
@stop