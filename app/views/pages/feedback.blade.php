@extends('layout')
@section('content')
<h2>Contact with me</h2>
<h3 class="active">​SHIVONSH | Alexandra Sh</h3>
<h4>shivonsh@gmail.com</h4>
<ul class="social">
    <li><a target="_blank" href="https://www.facebook.com/Shivonsh" class="fb"></a></li>
    <li><a target="_blank" href="http://vk.com/shivonsh" class="vk"></a></li>
    <li><a target="_blank" href="http://instagram.com/shivonsh" class="in"></a></li>
    <li><a target="_blank" href="http://shivonsh.tumblr.com/" class="tb"></a></li>
    <li><a target="_blank" href="https://twitter.com/shivonsh" class="tw"></a></li>
</ul>
<div class="form">
@if(isset($messages))
{{ $messages;}}
@endif
{{ Form::open(array('url' => '/feedback')) }}
{{ Form::text('name', '', array('placeholder' => 'Имя'));}}
{{ Form::email('email', $value = null, array('placeholder' => 'Email'));}}
{{ Form::text('subject', '', array('placeholder' => 'Тема'));}}
{{ Form::textarea('message', '', array('placeholder' => 'Сообщение'));}}
{{ HTML::image(Captcha::img(), 'Captcha image');}}
{{ Form::text('captcha', '', array('placeholder' => 'Код'));}}
{{ Form::submit('SEND', array('class' => 'submit'));}}
{{ Form::close() }}
</div>
@stop