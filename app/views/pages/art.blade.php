@extends('layout')
@section('content')
<div class="tags">
    @foreach($Tags as $Tag)
        <a href="/art/tag/{{$Tag->id}}" @if($active == $Tag->id) class="active" @endif>{{$Tag->name}}</a>
    @endforeach
    @if($active)
    <a href="/">All</a>
    @endif
</div>
@stop
@section('gallery')
<div class="gallery">
    @foreach($Gallery as $Image)
        <a class="artwork" rel="gallery" href="/i/full/{{$Image->file}}"><img src="/i/{{$Image->file}}"></a>
    @endforeach
</div>
@stop