<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link href="/css/main.css" type="text/css" rel="stylesheet">
    <link href="/css/jquery.fancybox.css" type="text/css" rel="stylesheet">
    <title>SHIVONSH</title>
</head>
<body>
<div class="main">
    <div class="container">
        <div class="head">
            <h1>Shivon<span>sh</span></h1>
            <ul class="menu">
                <li><a href="/">Home</a></li>
                <li><a href="#" class="inactive">Store</a></li>
                <li><a href="/feedback">Contacts</a></li>
                <li><a href="/art">Art</a></li>
            </ul>
        </div>
        <div class="body">
            @yield('content')
        </div>
        <div class="foot">
            <div class="copy">2014 «SHIVONSH»</div>
        </div>
    </div>
</div>
<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/index.js"></script>
</body>
</html>