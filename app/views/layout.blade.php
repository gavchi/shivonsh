<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/css/main.css?{{str_random(10)}}" type="text/css" rel="stylesheet">
    <link href="/css/jquery.fancybox.css" type="text/css" rel="stylesheet">
    <title>SHIVONSH</title>
</head>
<body>
<div class="main">
        <div class="head container">
            <h1>Shivon<span>sh</span></h1>
            <ul class="menu">
                <li><a href="http://store.shivonsh.com" target="_blank" class="inactive">Store</a></li>
                <li><a href="/feedback">Contacts</a></li>
                <li><a href="/">Art</a></li>
            </ul>
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
<script type="text/javascript" src="/js/index.js?{{str_random(10)}}"></script>
</body>
</html>