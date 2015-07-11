<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/css/main.css?{{str_random(10)}}" type="text/css" rel="stylesheet">
    <link href="/css/jquery.fancybox.css" type="text/css" rel="stylesheet">
    <title>SHIVONSH</title>
</head>
<body>
<div class="main admin">
        <div class="head container">
            <h1>Shivon<span>sh</span></h1>
            @if (Auth::check())
            <ul class="menu">
                <li><a href="/secret/tags">Tags</a></li>
                <li><a href="/secret/art">Art</a></li>
                <li><a href="/secret/logout">Bye</a></li>
            </ul>
            @endif
        </div>
        <div class="body container">
            @yield('content')
        </div>
            @yield('gallery')
        <div class="foot container">
            <div class="copy">2014 «SHIVONSH»</div>
        </div>
</div>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/masonry.pkgd.min.js"></script>
<script type="text/javascript" src="/js/imagesloaded.pkgd.min.js"></script>
<script type="text/javascript" src="/js/jquery.infinitescroll.min.js"></script>
<script type="text/javascript" src="/js/index.js?{{str_random(10)}}"></script>
</body>
</html>