<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('meta')
@yield('meta-directions')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Unbounded:wght@200..900&display=swap" rel="stylesheet">

<link rel="stylesheet" href="/css/style.css?v={{filemtime(public_path('css/style.css'))}}">

<link rel="stylesheet" type="text/css" href="../library/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="../library/slick/slick-theme.css"/>
